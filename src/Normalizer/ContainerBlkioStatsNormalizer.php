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

class ContainerBlkioStatsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerBlkioStats::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerBlkioStats::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerBlkioStats();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('io_service_bytes_recursive', $data) && null !== $data['io_service_bytes_recursive']) {
            $values = [];
            foreach ($data['io_service_bytes_recursive'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoServiceBytesRecursive($values);
            unset($data['io_service_bytes_recursive']);
        } elseif (\array_key_exists('io_service_bytes_recursive', $data) && null === $data['io_service_bytes_recursive']) {
            $object->setIoServiceBytesRecursive(null);
            unset($data['io_service_bytes_recursive']);
        }
        if (\array_key_exists('io_serviced_recursive', $data) && null !== $data['io_serviced_recursive']) {
            $values_1 = [];
            foreach ($data['io_serviced_recursive'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoServicedRecursive($values_1);
            unset($data['io_serviced_recursive']);
        } elseif (\array_key_exists('io_serviced_recursive', $data) && null === $data['io_serviced_recursive']) {
            $object->setIoServicedRecursive(null);
            unset($data['io_serviced_recursive']);
        }
        if (\array_key_exists('io_queue_recursive', $data) && null !== $data['io_queue_recursive']) {
            $values_2 = [];
            foreach ($data['io_queue_recursive'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoQueueRecursive($values_2);
            unset($data['io_queue_recursive']);
        } elseif (\array_key_exists('io_queue_recursive', $data) && null === $data['io_queue_recursive']) {
            $object->setIoQueueRecursive(null);
            unset($data['io_queue_recursive']);
        }
        if (\array_key_exists('io_service_time_recursive', $data) && null !== $data['io_service_time_recursive']) {
            $values_3 = [];
            foreach ($data['io_service_time_recursive'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoServiceTimeRecursive($values_3);
            unset($data['io_service_time_recursive']);
        } elseif (\array_key_exists('io_service_time_recursive', $data) && null === $data['io_service_time_recursive']) {
            $object->setIoServiceTimeRecursive(null);
            unset($data['io_service_time_recursive']);
        }
        if (\array_key_exists('io_wait_time_recursive', $data) && null !== $data['io_wait_time_recursive']) {
            $values_4 = [];
            foreach ($data['io_wait_time_recursive'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoWaitTimeRecursive($values_4);
            unset($data['io_wait_time_recursive']);
        } elseif (\array_key_exists('io_wait_time_recursive', $data) && null === $data['io_wait_time_recursive']) {
            $object->setIoWaitTimeRecursive(null);
            unset($data['io_wait_time_recursive']);
        }
        if (\array_key_exists('io_merged_recursive', $data) && null !== $data['io_merged_recursive']) {
            $values_5 = [];
            foreach ($data['io_merged_recursive'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoMergedRecursive($values_5);
            unset($data['io_merged_recursive']);
        } elseif (\array_key_exists('io_merged_recursive', $data) && null === $data['io_merged_recursive']) {
            $object->setIoMergedRecursive(null);
            unset($data['io_merged_recursive']);
        }
        if (\array_key_exists('io_time_recursive', $data) && null !== $data['io_time_recursive']) {
            $values_6 = [];
            foreach ($data['io_time_recursive'] as $value_6) {
                $values_6[] = $this->denormalizer->denormalize($value_6, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoTimeRecursive($values_6);
            unset($data['io_time_recursive']);
        } elseif (\array_key_exists('io_time_recursive', $data) && null === $data['io_time_recursive']) {
            $object->setIoTimeRecursive(null);
            unset($data['io_time_recursive']);
        }
        if (\array_key_exists('sectors_recursive', $data) && null !== $data['sectors_recursive']) {
            $values_7 = [];
            foreach ($data['sectors_recursive'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setSectorsRecursive($values_7);
            unset($data['sectors_recursive']);
        } elseif (\array_key_exists('sectors_recursive', $data) && null === $data['sectors_recursive']) {
            $object->setSectorsRecursive(null);
            unset($data['sectors_recursive']);
        }
        foreach ($data as $key => $value_8) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_8;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('ioServiceBytesRecursive') && null !== $data->getIoServiceBytesRecursive()) {
            $values = [];
            foreach ($data->getIoServiceBytesRecursive() as $value) {
                $values[] = null === $value ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['io_service_bytes_recursive'] = $values;
        }
        if ($data->isInitialized('ioServicedRecursive') && null !== $data->getIoServicedRecursive()) {
            $values_1 = [];
            foreach ($data->getIoServicedRecursive() as $value_1) {
                $values_1[] = null === $value_1 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['io_serviced_recursive'] = $values_1;
        }
        if ($data->isInitialized('ioQueueRecursive') && null !== $data->getIoQueueRecursive()) {
            $values_2 = [];
            foreach ($data->getIoQueueRecursive() as $value_2) {
                $values_2[] = null === $value_2 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_2, 'json', $context));
            }
            $dataArray['io_queue_recursive'] = $values_2;
        }
        if ($data->isInitialized('ioServiceTimeRecursive') && null !== $data->getIoServiceTimeRecursive()) {
            $values_3 = [];
            foreach ($data->getIoServiceTimeRecursive() as $value_3) {
                $values_3[] = null === $value_3 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_3, 'json', $context));
            }
            $dataArray['io_service_time_recursive'] = $values_3;
        }
        if ($data->isInitialized('ioWaitTimeRecursive') && null !== $data->getIoWaitTimeRecursive()) {
            $values_4 = [];
            foreach ($data->getIoWaitTimeRecursive() as $value_4) {
                $values_4[] = null === $value_4 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_4, 'json', $context));
            }
            $dataArray['io_wait_time_recursive'] = $values_4;
        }
        if ($data->isInitialized('ioMergedRecursive') && null !== $data->getIoMergedRecursive()) {
            $values_5 = [];
            foreach ($data->getIoMergedRecursive() as $value_5) {
                $values_5[] = null === $value_5 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_5, 'json', $context));
            }
            $dataArray['io_merged_recursive'] = $values_5;
        }
        if ($data->isInitialized('ioTimeRecursive') && null !== $data->getIoTimeRecursive()) {
            $values_6 = [];
            foreach ($data->getIoTimeRecursive() as $value_6) {
                $values_6[] = null === $value_6 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_6, 'json', $context));
            }
            $dataArray['io_time_recursive'] = $values_6;
        }
        if ($data->isInitialized('sectorsRecursive') && null !== $data->getSectorsRecursive()) {
            $values_7 = [];
            foreach ($data->getSectorsRecursive() as $value_7) {
                $values_7[] = null === $value_7 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_7, 'json', $context));
            }
            $dataArray['sectors_recursive'] = $values_7;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_8) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_8;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerBlkioStats::class => false];
    }
}
