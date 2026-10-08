<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ContainerStats extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * This endpoint returns a live stream of a container’s resource usage
     * statistics.
     *
     * The `precpu_stats` is the CPU statistic of the *previous* read, and is
     * used to calculate the CPU usage percentage. It is not an exact copy
     * of the `cpu_stats` field.
     *
     * If either `precpu_stats.online_cpus` or `cpu_stats.online_cpus` is
     * nil then for compatibility with older daemons the length of the
     * corresponding `cpu_usage.percpu_usage` array should be used.
     *
     * On a cgroup v2 host, the following fields are not set
     * * `blkio_stats`: all fields other than `io_service_bytes_recursive`
     * * `cpu_stats`: `cpu_usage.percpu_usage`
     * * `memory_stats`: `max_usage` and `failcnt`
     * Also, `memory_stats.stats` fields are incompatible with cgroup v1.
     *
     * To calculate the values shown by the `stats` command of the docker cli tool
     * the following formulas can be used:
     * * used_memory = `memory_stats.usage - memory_stats.stats.cache` (cgroups v1)
     * * used_memory = `memory_stats.usage - memory_stats.stats.inactive_file` (cgroups v2)
     * * available_memory = `memory_stats.limit`
     * * Memory usage % = `(used_memory / available_memory) * 100.0`
     * * cpu_delta = `cpu_stats.cpu_usage.total_usage - precpu_stats.cpu_usage.total_usage`
     * * system_cpu_delta = `cpu_stats.system_cpu_usage - precpu_stats.system_cpu_usage`
     * * number_cpus = `length(cpu_stats.cpu_usage.percpu_usage)` or `cpu_stats.online_cpus`
     * * CPU usage % = `(cpu_delta / system_cpu_delta) * number_cpus * 100.0`
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "stream"?: bool, //Stream the output. If false, the stats will be output once and then
     * it will disconnect.
     *    "one-shot"?: bool, //Only get a single stat instead of waiting for 2 cycles. Must be used
     * with `stream=false`.
     * } $queryParameters
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [rawurlencode($this->id)], '/containers/{id}/stats');
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
        $optionsResolver->setDefined(['stream', 'one-shot']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['stream' => true, 'one-shot' => false]);
        $optionsResolver->addAllowedTypes('stream', ['bool']);
        $optionsResolver->addAllowedTypes('one-shot', ['bool']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ContainerStatsNotFoundException
     * @throws \Docker\API\Exception\ContainerStatsInternalServerErrorException
     *
     * @return \Docker\API\Model\ContainerStatsResponse|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, 'Docker\API\Model\ContainerStatsResponse', 'json');
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ContainerStatsNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ContainerStatsInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
