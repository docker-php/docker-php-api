<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ImageBuild extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * Build an image from a tar archive with a `Dockerfile` in it.
     *
     * The `Dockerfile` specifies how the image is built from the tar archive. It is typically in the archive's root, but can be at a different path or have a different name by specifying the `dockerfile` parameter. [See the `Dockerfile` reference for more information](https://docs.docker.com/engine/reference/builder/).
     *
     * The Docker daemon performs a preliminary validation of the `Dockerfile` before starting the build, and returns an error if the syntax is incorrect. After that, each instruction is run one-by-one until the ID of the new image is output.
     *
     * The build is canceled if the client drops the connection by quitting or being killed.
     *
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array{
     *    "dockerfile"?: string, //Path within the build context to the `Dockerfile`. This is ignored if `remote` is specified and points to an external `Dockerfile`.
     *    "t"?: string, //A name and optional tag to apply to the image in the `name:tag` format. If you omit the tag the default `latest` value is assumed. You can provide several `t` parameters.
     *    "extrahosts"?: string, //Extra hosts to add to /etc/hosts
     *    "remote"?: string, //A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called `Dockerfile` and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the `dockerfile` parameter is also specified, there must be a file with the corresponding path inside the tarball.
     *    "q"?: bool, //Suppress verbose build output.
     *    "nocache"?: bool, //Do not use the cache when building the image.
     *    "cachefrom"?: string, //JSON array of images used for build cache resolution.
     *    "pull"?: string, //Attempt to pull the image even if an older image exists locally.
     *    "rm"?: bool, //Remove intermediate containers after a successful build.
     *    "forcerm"?: bool, //Always remove intermediate containers, even upon failure.
     *    "memory"?: int, //Set memory limit for build.
     *    "memswap"?: int, //Total memory (memory + swap). Set as `-1` to disable swap.
     *    "cpushares"?: int, //CPU shares (relative weight).
     *    "cpusetcpus"?: string, //CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     *    "cpuperiod"?: int, //The length of a CPU period in microseconds.
     *    "cpuquota"?: int, //Microseconds of CPU time that the container can get in a CPU period.
     *    "buildargs"?: string, //JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the `Dockerfile` RUN instruction, or for variable expansion in other `Dockerfile` instructions. This is not meant for passing secret values.
     *
     * For example, the build arg `FOO=bar` would become `{"FOO":"bar"}` in JSON. This would result in the query parameter `buildargs={"FOO":"bar"}`. Note that `{"FOO":"bar"}` should be URI component encoded.
     *
     * [Read more about the buildargs instruction.](https://docs.docker.com/engine/reference/builder/#arg)
     *    "shmsize"?: int, //Size of `/dev/shm` in bytes. The size must be greater than 0. If omitted the system uses 64MB.
     *    "squash"?: bool, //Squash the resulting images layers into a single layer. *(Experimental release only.)*
     *    "labels"?: string, //Arbitrary key/value labels to set on the image, as a JSON map of string pairs.
     *    "networkmode"?: string, //Sets the networking mode for the run commands during build. Supported
     * standard values are: `bridge`, `host`, `none`, and `container:<name|id>`.
     * Any other value is taken as a custom network's name or ID to which this
     * container should connect to.
     *    "platform"?: string, //Platform in the format os[/arch[/variant]]
     *    "target"?: string, //Target build stage
     *    "outputs"?: string, //BuildKit output configuration in the format of a stringified JSON array of objects.
     * Each object must have two top-level properties: `Type` and `Attrs`.
     * The `Type` property must be set to 'moby'.
     * The `Attrs` property is a map of attributes for the BuildKit output configuration.
     * See https://docs.docker.com/build/exporters/oci-docker/ for more information.
     *
     * Example:
     *
     * ```
     * [{"Type":"moby","Attrs":{"type":"image","force-compression":"true","compression":"zstd"}}]
     * ```
     *    "version"?: string, //Version of the builder backend to use.
     *
     * - `1` is the first generation classic (deprecated) builder in the Docker daemon (default)
     * - `2` is [BuildKit](https://github.com/moby/buildkit)
     * } $queryParameters
     * @param array{
     *    "X-Registry-Config"?: string, //This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.
     *
     * The key is a registry URL, and the value is an auth configuration object, [as described in the authentication section](#section/Authentication). For example:
     *
     * ```
     * {
     * "docker.example.com": {
     * "username": "janedoe",
     * "password": "hunter2"
     * },
     * "https://index.docker.io/v1/": {
     * "username": "mobydock",
     * "password": "conta1n3rize14"
     * }
     * }
     * ```
     *
     * Only the registry domain name (and port if not the default 443) are required. However, for legacy reasons, the Docker Hub registry must be specified with both a `https://` prefix and a `/v1/` suffix even though Docker will prefer to use the v2 registry API.
     * } $headerParameters
     */
    public function __construct($requestBody = null, array $queryParameters = [], array $headerParameters = [])
    {
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
        return '/build';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (\is_string($this->body) || \is_resource($this->body) || $this->body instanceof \Psr\Http\Message\StreamInterface) {
            return [['Content-Type' => ['application/octet-stream']], $this->body];
        }
        if (\is_string($this->body) || \is_resource($this->body) || $this->body instanceof \Psr\Http\Message\StreamInterface) {
            return [['Content-Type' => ['application/x-tar']], $this->body];
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
        $optionsResolver->setDefined(['dockerfile', 't', 'extrahosts', 'remote', 'q', 'nocache', 'cachefrom', 'pull', 'rm', 'forcerm', 'memory', 'memswap', 'cpushares', 'cpusetcpus', 'cpuperiod', 'cpuquota', 'buildargs', 'shmsize', 'squash', 'labels', 'networkmode', 'platform', 'target', 'outputs', 'version']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['dockerfile' => 'Dockerfile', 'q' => false, 'nocache' => false, 'rm' => true, 'forcerm' => false, 'platform' => '', 'target' => '', 'outputs' => '', 'version' => '1']);
        $optionsResolver->addAllowedTypes('dockerfile', ['string']);
        $optionsResolver->addAllowedTypes('t', ['string']);
        $optionsResolver->addAllowedTypes('extrahosts', ['string']);
        $optionsResolver->addAllowedTypes('remote', ['string']);
        $optionsResolver->addAllowedTypes('q', ['bool']);
        $optionsResolver->addAllowedTypes('nocache', ['bool']);
        $optionsResolver->addAllowedTypes('cachefrom', ['string']);
        $optionsResolver->addAllowedTypes('pull', ['string']);
        $optionsResolver->addAllowedTypes('rm', ['bool']);
        $optionsResolver->addAllowedTypes('forcerm', ['bool']);
        $optionsResolver->addAllowedTypes('memory', ['int']);
        $optionsResolver->addAllowedTypes('memswap', ['int']);
        $optionsResolver->addAllowedTypes('cpushares', ['int']);
        $optionsResolver->addAllowedTypes('cpusetcpus', ['string']);
        $optionsResolver->addAllowedTypes('cpuperiod', ['int']);
        $optionsResolver->addAllowedTypes('cpuquota', ['int']);
        $optionsResolver->addAllowedTypes('buildargs', ['string']);
        $optionsResolver->addAllowedTypes('shmsize', ['int']);
        $optionsResolver->addAllowedTypes('squash', ['bool']);
        $optionsResolver->addAllowedTypes('labels', ['string']);
        $optionsResolver->addAllowedTypes('networkmode', ['string']);
        $optionsResolver->addAllowedTypes('platform', ['string']);
        $optionsResolver->addAllowedTypes('target', ['string']);
        $optionsResolver->addAllowedTypes('outputs', ['string']);
        $optionsResolver->addAllowedTypes('version', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['X-Registry-Config']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('X-Registry-Config', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ImageBuildBadRequestException
     * @throws \Docker\API\Exception\ImageBuildInternalServerErrorException
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
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ImageBuildBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ImageBuildInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
