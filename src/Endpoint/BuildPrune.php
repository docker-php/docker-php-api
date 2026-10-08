<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class BuildPrune extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * @param array{
     *    "keep-storage"?: int, //Amount of disk space in bytes to keep for cache
     *
     * > **Deprecated**: This parameter is deprecated and has been renamed to "reserved-space".
     * > It is kept for backward compatibility and will be removed in API v1.52.
     *    "reserved-space"?: int, //Amount of disk space in bytes to keep for cache
     *    "max-used-space"?: int, //Maximum amount of disk space allowed to keep for cache
     *    "min-free-space"?: int, //Target amount of free disk space after pruning
     *    "all"?: bool, //Remove all types of build cache
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the list of build cache objects.
     *
     * Available filters:
     *
     * - `until=<timestamp>` remove cache older than `<timestamp>`. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon's local time.
     * - `id=<id>`
     * - `parent=<id>`
     * - `type=<string>`
     * - `description=<string>`
     * - `inuse`
     * - `shared`
     * - `private`
     * } $queryParameters
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/build/prune';
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
        $optionsResolver->setDefined(['keep-storage', 'reserved-space', 'max-used-space', 'min-free-space', 'all', 'filters']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('keep-storage', ['int']);
        $optionsResolver->addAllowedTypes('reserved-space', ['int']);
        $optionsResolver->addAllowedTypes('max-used-space', ['int']);
        $optionsResolver->addAllowedTypes('min-free-space', ['int']);
        $optionsResolver->addAllowedTypes('all', ['bool']);
        $optionsResolver->addAllowedTypes('filters', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\BuildPruneInternalServerErrorException
     *
     * @return \Docker\API\Model\BuildPrunePostResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, 'Docker\API\Model\BuildPrunePostResponse200', 'json');
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\BuildPruneInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
