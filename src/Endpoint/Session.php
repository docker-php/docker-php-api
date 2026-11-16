<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class Session extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $accept;

    /**
     * Start a new interactive session with a server. Session allows server to
     * call back to the client for advanced capabilities.
     *
     * > **Deprecated**: This endpoint is deprecated and will be removed in a future version.
     * > Server should support gRPC directly on the listening socket.
     *
     * ### Hijacking
     *
     * This endpoint hijacks the HTTP connection to HTTP2 transport that allows
     * the client to expose gPRC services on that connection.
     *
     * For example, the client sends this request to upgrade the connection:
     *
     * ```
     * POST /session HTTP/1.1
     * Upgrade: h2c
     * Connection: Upgrade
     * ```
     *
     * The Docker daemon responds with a `101 UPGRADED` response follow with
     * the raw stream:
     *
     * ```
     * HTTP/1.1 101 UPGRADED
     * Connection: Upgrade
     * Upgrade: h2c
     * ```
     *
     * @param array $accept Accept content header application/vnd.docker.raw-stream|application/json
     */
    public function __construct(array $accept = [])
    {
        $this->accept = $accept;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/session';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/vnd.docker.raw-stream', 'application/json']];
        }

        return $this->accept;
    }

    /**
     * @throws \Docker\API\Exception\SessionBadRequestException
     * @throws \Docker\API\Exception\SessionInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (101 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\SessionBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\SessionInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
