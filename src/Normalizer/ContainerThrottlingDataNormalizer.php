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

class ContainerThrottlingDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerThrottlingData::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerThrottlingData::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerThrottlingData();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('periods', $data) && null !== $data['periods']) {
            $object->setPeriods($data['periods']);
            unset($data['periods']);
        } elseif (\array_key_exists('periods', $data) && null === $data['periods']) {
            $object->setPeriods(null);
            unset($data['periods']);
        }
        if (\array_key_exists('throttled_periods', $data) && null !== $data['throttled_periods']) {
            $object->setThrottledPeriods($data['throttled_periods']);
            unset($data['throttled_periods']);
        } elseif (\array_key_exists('throttled_periods', $data) && null === $data['throttled_periods']) {
            $object->setThrottledPeriods(null);
            unset($data['throttled_periods']);
        }
        if (\array_key_exists('throttled_time', $data) && null !== $data['throttled_time']) {
            $object->setThrottledTime($data['throttled_time']);
            unset($data['throttled_time']);
        } elseif (\array_key_exists('throttled_time', $data) && null === $data['throttled_time']) {
            $object->setThrottledTime(null);
            unset($data['throttled_time']);
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
        if ($data->isInitialized('periods') && null !== $data->getPeriods()) {
            $dataArray['periods'] = $data->getPeriods();
        }
        if ($data->isInitialized('throttledPeriods') && null !== $data->getThrottledPeriods()) {
            $dataArray['throttled_periods'] = $data->getThrottledPeriods();
        }
        if ($data->isInitialized('throttledTime') && null !== $data->getThrottledTime()) {
            $dataArray['throttled_time'] = $data->getThrottledTime();
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
        return [\Docker\API\Model\ContainerThrottlingData::class => false];
    }
}
