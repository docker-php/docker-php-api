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

class ImagesDiskUsageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ImagesDiskUsage::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ImagesDiskUsage::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ImagesDiskUsage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('ActiveCount', $data) && null !== $data['ActiveCount']) {
            $object->setActiveCount($data['ActiveCount']);
            unset($data['ActiveCount']);
        } elseif (\array_key_exists('ActiveCount', $data) && null === $data['ActiveCount']) {
            $object->setActiveCount(null);
            unset($data['ActiveCount']);
        }
        if (\array_key_exists('TotalCount', $data) && null !== $data['TotalCount']) {
            $object->setTotalCount($data['TotalCount']);
            unset($data['TotalCount']);
        } elseif (\array_key_exists('TotalCount', $data) && null === $data['TotalCount']) {
            $object->setTotalCount(null);
            unset($data['TotalCount']);
        }
        if (\array_key_exists('Reclaimable', $data) && null !== $data['Reclaimable']) {
            $object->setReclaimable($data['Reclaimable']);
            unset($data['Reclaimable']);
        } elseif (\array_key_exists('Reclaimable', $data) && null === $data['Reclaimable']) {
            $object->setReclaimable(null);
            unset($data['Reclaimable']);
        }
        if (\array_key_exists('TotalSize', $data) && null !== $data['TotalSize']) {
            $object->setTotalSize($data['TotalSize']);
            unset($data['TotalSize']);
        } elseif (\array_key_exists('TotalSize', $data) && null === $data['TotalSize']) {
            $object->setTotalSize(null);
            unset($data['TotalSize']);
        }
        if (\array_key_exists('Items', $data) && null !== $data['Items']) {
            $values = [];
            foreach ($data['Items'] as $value) {
                $values[] = $value;
            }
            $object->setItems($values);
            unset($data['Items']);
        } elseif (\array_key_exists('Items', $data) && null === $data['Items']) {
            $object->setItems(null);
            unset($data['Items']);
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
        if ($data->isInitialized('activeCount') && null !== $data->getActiveCount()) {
            $dataArray['ActiveCount'] = $data->getActiveCount();
        }
        if ($data->isInitialized('totalCount') && null !== $data->getTotalCount()) {
            $dataArray['TotalCount'] = $data->getTotalCount();
        }
        if ($data->isInitialized('reclaimable') && null !== $data->getReclaimable()) {
            $dataArray['Reclaimable'] = $data->getReclaimable();
        }
        if ($data->isInitialized('totalSize') && null !== $data->getTotalSize()) {
            $dataArray['TotalSize'] = $data->getTotalSize();
        }
        if ($data->isInitialized('items') && null !== $data->getItems()) {
            $values = [];
            foreach ($data->getItems() as $value) {
                $values[] = $value;
            }
            $dataArray['Items'] = $values;
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
        return [\Docker\API\Model\ImagesDiskUsage::class => false];
    }
}
