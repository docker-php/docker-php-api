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

class ContainerCPUUsageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerCPUUsage::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerCPUUsage::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerCPUUsage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('total_usage', $data) && null !== $data['total_usage']) {
            $object->setTotalUsage($data['total_usage']);
            unset($data['total_usage']);
        } elseif (\array_key_exists('total_usage', $data) && null === $data['total_usage']) {
            $object->setTotalUsage(null);
            unset($data['total_usage']);
        }
        if (\array_key_exists('percpu_usage', $data) && null !== $data['percpu_usage']) {
            $values = [];
            foreach ($data['percpu_usage'] as $value) {
                $values[] = $value;
            }
            $object->setPercpuUsage($values);
            unset($data['percpu_usage']);
        } elseif (\array_key_exists('percpu_usage', $data) && null === $data['percpu_usage']) {
            $object->setPercpuUsage(null);
            unset($data['percpu_usage']);
        }
        if (\array_key_exists('usage_in_kernelmode', $data) && null !== $data['usage_in_kernelmode']) {
            $object->setUsageInKernelmode($data['usage_in_kernelmode']);
            unset($data['usage_in_kernelmode']);
        } elseif (\array_key_exists('usage_in_kernelmode', $data) && null === $data['usage_in_kernelmode']) {
            $object->setUsageInKernelmode(null);
            unset($data['usage_in_kernelmode']);
        }
        if (\array_key_exists('usage_in_usermode', $data) && null !== $data['usage_in_usermode']) {
            $object->setUsageInUsermode($data['usage_in_usermode']);
            unset($data['usage_in_usermode']);
        } elseif (\array_key_exists('usage_in_usermode', $data) && null === $data['usage_in_usermode']) {
            $object->setUsageInUsermode(null);
            unset($data['usage_in_usermode']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('totalUsage') && null !== $data->getTotalUsage()) {
            $dataArray['total_usage'] = $data->getTotalUsage();
        }
        if ($data->isInitialized('percpuUsage') && null !== $data->getPercpuUsage()) {
            $values = [];
            foreach ($data->getPercpuUsage() as $value) {
                $values[] = $value;
            }
            $dataArray['percpu_usage'] = $values;
        }
        if ($data->isInitialized('usageInKernelmode') && null !== $data->getUsageInKernelmode()) {
            $dataArray['usage_in_kernelmode'] = $data->getUsageInKernelmode();
        }
        if ($data->isInitialized('usageInUsermode') && null !== $data->getUsageInUsermode()) {
            $dataArray['usage_in_usermode'] = $data->getUsageInUsermode();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerCPUUsage::class => false];
    }
}
