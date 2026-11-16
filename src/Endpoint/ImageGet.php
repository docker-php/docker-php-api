<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ImageGet extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $name;
    protected $accept;

    /**
     * Get a tarball containing all images and metadata for a repository.
     *
     * If `name` is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned. If `name` is an image ID, similarly only that image (and its parents) are returned, but with the exclusion of the `repositories` file in the tarball, as there were no image names referenced.
     *
     * ### Image tarball format
     *
     * An image tarball contains [Content as defined in the OCI Image Layout Specification](https://github.com/opencontainers/image-spec/blob/v1.1.1/image-layout.md#content).
     *
     * Additionally, includes the manifest.json file associated with a backwards compatible docker save format.
     *
     * If the tarball defines a repository, the tarball should also include a `repositories` file at the root that contains a list of repository and tag names mapped to layer IDs.
     *
     * ```json
     * {
     *   "hello-world": {
     *     "latest": "565a9d68a73f6706862bfe8409a7f659776d4d60a8d096eb4a3cbce6999cc2a1"
     *   }
     * }
     * ```
     *
     * @param string $name Image name or ID
     * @param array{
     *    "platform"?: array, //JSON encoded OCI platform describing a platform which will be used
     * to select a platform-specific image to be saved if the image is
     * multi-platform.
     * If not provided, the full multi-platform image will be saved.
     *
     * Example: `{"os": "linux", "architecture": "arm", "variant": "v5"}`
     * } $queryParameters
     * @param array $accept Accept content header application/x-tar|application/json
     */
    public function __construct(string $name, array $queryParameters = [], array $accept = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [rawurlencode($this->name)], '/images/{name}/get');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/x-tar', 'application/json']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['platform']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('platform', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['platform' => ['style' => 'form', 'explode' => true]];
    }

    /**
     * @throws \Docker\API\Exception\ImageGetInternalServerErrorException
     *
     * @return string|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            try {
                $decodedBody = json_decode($body, false, 512, \JSON_THROW_ON_ERROR);

                return $decodedBody;
            } catch (\JsonException $jsonException) {
                throw new \Jane\Component\JsonSchemaRuntime\Exception\MalformedJsonException('Malformed JSON response body.', 0, $jsonException);
            }
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ImageGetInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
