<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ImageDelete extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $name;

    /**
     * Remove an image, along with any untagged parent images that were
     * referenced by that image.
     *
     * Images can't be removed if they have descendant images, are being
     * used by a running container or are being used by a build.
     *
     * @param string $name Image name or ID
     * @param array{
     *    "force"?: bool, //Remove the image even if it is being used by stopped containers or has other tags
     *    "noprune"?: bool, //Do not delete untagged parent images
     *    "platforms"?: array, //Select platform-specific content to delete.
     * Repeat the parameter to select multiple platforms.
     * Each platform is a OCI platform encoded as a JSON string.
     * } $queryParameters
     */
    public function __construct(string $name, array $queryParameters = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [rawurlencode($this->name)], '/images/{name}');
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
        $optionsResolver->setDefined(['force', 'noprune', 'platforms']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['force' => false, 'noprune' => false]);
        $optionsResolver->addAllowedTypes('force', ['bool']);
        $optionsResolver->addAllowedTypes('noprune', ['bool']);
        $optionsResolver->addAllowedTypes('platforms', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['platforms' => ['style' => 'form', 'explode' => true]];
    }

    /**
     * @throws \Docker\API\Exception\ImageDeleteNotFoundException
     * @throws \Docker\API\Exception\ImageDeleteConflictException
     * @throws \Docker\API\Exception\ImageDeleteInternalServerErrorException
     *
     * @return \Docker\API\Model\ImageDeleteResponseItem[]|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, 'Docker\API\Model\ImageDeleteResponseItem[]', 'json');
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ImageDeleteNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (409 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ImageDeleteConflictException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ImageDeleteInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
