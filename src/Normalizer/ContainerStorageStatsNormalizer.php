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

class ContainerStorageStatsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerStorageStats::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerStorageStats::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerStorageStats();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('read_count_normalized', $data) && null !== $data['read_count_normalized']) {
            $object->setReadCountNormalized($data['read_count_normalized']);
            unset($data['read_count_normalized']);
        } elseif (\array_key_exists('read_count_normalized', $data) && null === $data['read_count_normalized']) {
            $object->setReadCountNormalized(null);
            unset($data['read_count_normalized']);
        }
        if (\array_key_exists('read_size_bytes', $data) && null !== $data['read_size_bytes']) {
            $object->setReadSizeBytes($data['read_size_bytes']);
            unset($data['read_size_bytes']);
        } elseif (\array_key_exists('read_size_bytes', $data) && null === $data['read_size_bytes']) {
            $object->setReadSizeBytes(null);
            unset($data['read_size_bytes']);
        }
        if (\array_key_exists('write_count_normalized', $data) && null !== $data['write_count_normalized']) {
            $object->setWriteCountNormalized($data['write_count_normalized']);
            unset($data['write_count_normalized']);
        } elseif (\array_key_exists('write_count_normalized', $data) && null === $data['write_count_normalized']) {
            $object->setWriteCountNormalized(null);
            unset($data['write_count_normalized']);
        }
        if (\array_key_exists('write_size_bytes', $data) && null !== $data['write_size_bytes']) {
            $object->setWriteSizeBytes($data['write_size_bytes']);
            unset($data['write_size_bytes']);
        } elseif (\array_key_exists('write_size_bytes', $data) && null === $data['write_size_bytes']) {
            $object->setWriteSizeBytes(null);
            unset($data['write_size_bytes']);
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
        if ($data->isInitialized('readCountNormalized') && null !== $data->getReadCountNormalized()) {
            $dataArray['read_count_normalized'] = $data->getReadCountNormalized();
        }
        if ($data->isInitialized('readSizeBytes') && null !== $data->getReadSizeBytes()) {
            $dataArray['read_size_bytes'] = $data->getReadSizeBytes();
        }
        if ($data->isInitialized('writeCountNormalized') && null !== $data->getWriteCountNormalized()) {
            $dataArray['write_count_normalized'] = $data->getWriteCountNormalized();
        }
        if ($data->isInitialized('writeSizeBytes') && null !== $data->getWriteSizeBytes()) {
            $dataArray['write_size_bytes'] = $data->getWriteSizeBytes();
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
        return [\Docker\API\Model\ContainerStorageStats::class => false];
    }
}
