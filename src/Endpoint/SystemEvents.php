<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class SystemEvents extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * Stream real-time events from the server.
     *
     * Various objects within Docker report events when something happens to them.
     *
     * Containers report these events: `attach`, `commit`, `copy`, `create`, `destroy`, `detach`, `die`, `exec_create`, `exec_detach`, `exec_start`, `exec_die`, `export`, `health_status`, `kill`, `oom`, `pause`, `rename`, `resize`, `restart`, `start`, `stop`, `top`, `unpause`, `update`, and `prune`
     *
     * Images report these events: `create`, `delete`, `import`, `load`, `pull`, `push`, `save`, `tag`, `untag`, and `prune`
     *
     * Volumes report these events: `create`, `mount`, `unmount`, `destroy`, and `prune`
     *
     * Networks report these events: `create`, `connect`, `disconnect`, `destroy`, `update`, `remove`, and `prune`
     *
     * The Docker daemon reports these events: `reload`
     *
     * Services report these events: `create`, `update`, and `remove`
     *
     * Nodes report these events: `create`, `update`, and `remove`
     *
     * Secrets report these events: `create`, `update`, and `remove`
     *
     * Configs report these events: `create`, `update`, and `remove`
     *
     * The Builder reports `prune` events
     *
     * @param array{
     *    "since"?: string, //Show events created since this timestamp then stream new events.
     *    "until"?: string, //Show events created until this timestamp then stop streaming.
     *    "filters"?: string, //A JSON encoded value of filters (a `map[string][]string`) to process on the event list. Available filters:
     *
     * - `config=<string>` config name or ID
     * - `container=<string>` container name or ID
     * - `daemon=<string>` daemon name or ID
     * - `event=<string>` event type
     * - `image=<string>` image name or ID
     * - `label=<string>` image or container label
     * - `network=<string>` network name or ID
     * - `node=<string>` node ID
     * - `plugin`=<string> plugin name or ID
     * - `scope`=<string> local or swarm
     * - `secret=<string>` secret name or ID
     * - `service=<string>` service name or ID
     * - `type=<string>` object to filter by, one of `container`, `image`, `volume`, `network`, `daemon`, `plugin`, `node`, `service`, `secret` or `config`
     * - `volume=<string>` volume name
     * } $queryParameters
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/events';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['since', 'until', 'filters']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('since', ['string']);
        $optionsResolver->addAllowedTypes('until', ['string']);
        $optionsResolver->addAllowedTypes('filters', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\SystemEventsBadRequestException
     * @throws \Docker\API\Exception\SystemEventsInternalServerErrorException
     *
     * @return \Docker\API\Model\EventMessage|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, 'Docker\API\Model\EventMessage', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\SystemEventsBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\SystemEventsInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
