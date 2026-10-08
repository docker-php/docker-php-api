<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ContainerCPUStatsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerCPUStats::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerCPUStats::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerCPUStats();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('cpu_usage', $data) && null !== $data['cpu_usage']) {
            $object->setCpuUsage($this->denormalizer->denormalize($data['cpu_usage'], \Docker\API\Model\ContainerCPUUsage::class, 'json', $context));
            unset($data['cpu_usage']);
        } elseif (\array_key_exists('cpu_usage', $data) && null === $data['cpu_usage']) {
            $object->setCpuUsage(null);
            unset($data['cpu_usage']);
        }
        if (\array_key_exists('system_cpu_usage', $data) && null !== $data['system_cpu_usage']) {
            $object->setSystemCpuUsage($data['system_cpu_usage']);
            unset($data['system_cpu_usage']);
        } elseif (\array_key_exists('system_cpu_usage', $data) && null === $data['system_cpu_usage']) {
            $object->setSystemCpuUsage(null);
            unset($data['system_cpu_usage']);
        }
        if (\array_key_exists('online_cpus', $data) && null !== $data['online_cpus']) {
            $object->setOnlineCpus($data['online_cpus']);
            unset($data['online_cpus']);
        } elseif (\array_key_exists('online_cpus', $data) && null === $data['online_cpus']) {
            $object->setOnlineCpus(null);
            unset($data['online_cpus']);
        }
        if (\array_key_exists('throttling_data', $data) && null !== $data['throttling_data']) {
            $object->setThrottlingData($this->denormalizer->denormalize($data['throttling_data'], \Docker\API\Model\ContainerThrottlingData::class, 'json', $context));
            unset($data['throttling_data']);
        } elseif (\array_key_exists('throttling_data', $data) && null === $data['throttling_data']) {
            $object->setThrottlingData(null);
            unset($data['throttling_data']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('cpuUsage') && null !== $data->getCpuUsage()) {
            $dataArray['cpu_usage'] = null === $data->getCpuUsage() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getCpuUsage(), 'json', $context));
        }
        if ($data->isInitialized('systemCpuUsage') && null !== $data->getSystemCpuUsage()) {
            $dataArray['system_cpu_usage'] = $data->getSystemCpuUsage();
        }
        if ($data->isInitialized('onlineCpus') && null !== $data->getOnlineCpus()) {
            $dataArray['online_cpus'] = $data->getOnlineCpus();
        }
        if ($data->isInitialized('throttlingData') && null !== $data->getThrottlingData()) {
            $dataArray['throttling_data'] = null === $data->getThrottlingData() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getThrottlingData(), 'json', $context));
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerCPUStats::class => false];
    }
}
