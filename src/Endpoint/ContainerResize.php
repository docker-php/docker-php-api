<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ContainerResize extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Resize the TTY for a container.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "h": int, //Height of the TTY session in characters
     *    "w": int, //Width of the TTY session in characters
     * } $queryParameters
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [rawurlencode($this->id)], '/containers/{id}/resize');
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
        $optionsResolver->setDefined(['h', 'w']);
        $optionsResolver->setRequired(['h', 'w']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('h', ['int']);
        $optionsResolver->addAllowedTypes('w', ['int']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ContainerResizeNotFoundException
     * @throws \Docker\API\Exception\ContainerResizeInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ContainerResizeNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ContainerResizeInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
