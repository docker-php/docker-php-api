<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ImageGetAll extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $accept;

    /**
     * Get a tarball containing all images and metadata for several image
     * repositories.
     *
     * For each value of the `names` parameter: if it is a specific name and
     * tag (e.g. `ubuntu:latest`), then only that image (and its parents) are
     * returned; if it is an image ID, similarly only that image (and its parents)
     * are returned and there would be no names referenced in the 'repositories'
     * file for this image ID.
     *
     * For details on the format, see the [export image endpoint](#operation/ImageGet).
     *
     * @param array{
     *    "names"?: array, //Image names to filter by. Repeat the parameter for multiple images.
     *    "platform"?: array, //JSON encoded OCI platform(s) which will be used to select the
     * platform-specific image(s) to be saved if the image is
     * multi-platform. If not provided, the full multi-platform image
     * will be saved.
     *
     * Example: `{"os": "linux", "architecture": "arm", "variant": "v5"}`
     * } $queryParameters
     * @param array $accept Accept content header application/x-tar|application/json
     */
    public function __construct(array $queryParameters = [], array $accept = [])
    {
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/images/get';
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
        $optionsResolver->setDefined(['names', 'platform']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('names', ['array']);
        $optionsResolver->addAllowedTypes('platform', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['names' => ['style' => 'form', 'explode' => true], 'platform' => ['style' => 'form', 'explode' => true]];
    }

    /**
     * @throws \Docker\API\Exception\ImageGetAllInternalServerErrorException
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
            throw new \Docker\API\Exception\ImageGetAllInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
