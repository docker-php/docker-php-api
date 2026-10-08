<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class PluginUpgrade extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $name;

    /**
     * @param string                                   $name        The name of the plugin. The `:latest` tag is optional, and is the
     *                                                              default if omitted.
     * @param \Docker\API\Model\PluginPrivilege[]|null $requestBody
     * @param array{
     *    "remote": string, //Remote reference to upgrade to.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     * } $queryParameters
     * @param array{
     *    "X-Registry-Auth"?: string, //A base64url-encoded auth configuration to use when pulling a plugin
     * from a registry.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     * } $headerParameters
     */
    public function __construct(string $name, ?array $requestBody = null, array $queryParameters = [], array $headerParameters = [])
    {
        $this->name = $name;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [rawurlencode($this->name)], '/plugins/{name}/upgrade');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (\is_array($this->body) && isset($this->body[0]) && $this->body[0] instanceof \Docker\API\Model\PluginPrivilege) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        if (\is_array($this->body) && isset($this->body[0]) && $this->body[0] instanceof \Docker\API\Model\PluginPrivilege) {
            return [['Content-Type' => ['text/plain']], $this->body];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['remote']);
        $optionsResolver->setRequired(['remote']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('remote', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['X-Registry-Auth']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('X-Registry-Auth', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\PluginUpgradeNotFoundException
     * @throws \Docker\API\Exception\PluginUpgradeInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\PluginUpgradeNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\PluginUpgradeInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
