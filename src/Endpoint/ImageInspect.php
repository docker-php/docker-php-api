<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ImageInspect extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $name;

    /**
     * Return low-level information about an image.
     *
     * @param string $name Image name or id
     * @param array{
     *    "manifests"?: bool, //Include Manifests in the image summary.
     *
     * The `manifests` and `platform` options are mutually exclusive, and
     * an error is produced if both are set.
     *    "platform"?: string, //JSON-encoded OCI platform to select the platform-variant.
     * If omitted, it defaults to any locally available platform,
     * prioritizing the daemon's host platform.
     *
     * If the daemon provides a multi-platform image store, this selects
     * the platform-variant to show inspect. If the image is
     * a single-platform image, or if the multi-platform image does not
     * provide a variant matching the given platform, an error is returned.
     *
     * The `platform` and `manifests` options are mutually exclusive, and
     * an error is produced if both are set.
     *
     * Example: `{"os": "linux", "architecture": "arm", "variant": "v5"}`
     * } $queryParameters
     */
    public function __construct(string $name, array $queryParameters = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [rawurlencode($this->name)], '/images/{name}/json');
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
        $optionsResolver->setDefined(['manifests', 'platform']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['manifests' => false]);
        $optionsResolver->addAllowedTypes('manifests', ['bool']);
        $optionsResolver->addAllowedTypes('platform', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ImageInspectNotFoundException
     * @throws \Docker\API\Exception\ImageInspectInternalServerErrorException
     *
     * @return \Docker\API\Model\ImageInspect|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, 'Docker\API\Model\ImageInspect', 'json');
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ImageInspectNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ImageInspectInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
