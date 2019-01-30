<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Endpoint;

class SecretList extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\AmpArtaxEndpoint, \Jane\OpenApiRuntime\Client\Psr7HttplugEndpoint
{
    /**
     * @param array $queryParameters {
     *
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the secrets list. Available filters:

    - `id=<secret id>`
    - `label=<key> or label=<key>=value`
    - `name=<secret name>`
    - `names=<secret name>`

     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\AmpArtaxEndpointTrait, \Jane\OpenApiRuntime\Client\Psr7HttplugEndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/secrets';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, \Http\Message\StreamFactory $streamFactory = null): array
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
        $optionsResolver->setDefined(['filters']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('filters', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\SecretListInternalServerErrorException
     * @throws \Docker\API\Exception\SecretListServiceUnavailableException
     *
     * @return \Docker\API\Model\Secret[]|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Docker\\API\\Model\\Secret[]', 'json');
        }
        if (500 === $status) {
            throw new \Docker\API\Exception\SecretListInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \Docker\API\Exception\SecretListServiceUnavailableException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
    }
}
