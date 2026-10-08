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

class TaskSpecResourcesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecResources::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecResources::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\TaskSpecResources();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Limits', $data) && null !== $data['Limits']) {
            $object->setLimits($this->denormalizer->denormalize($data['Limits'], \Docker\API\Model\Limit::class, 'json', $context));
            unset($data['Limits']);
        } elseif (\array_key_exists('Limits', $data) && null === $data['Limits']) {
            $object->setLimits(null);
            unset($data['Limits']);
        }
        if (\array_key_exists('Reservations', $data) && null !== $data['Reservations']) {
            $object->setReservations($this->denormalizer->denormalize($data['Reservations'], \Docker\API\Model\ResourceObject::class, 'json', $context));
            unset($data['Reservations']);
        } elseif (\array_key_exists('Reservations', $data) && null === $data['Reservations']) {
            $object->setReservations(null);
            unset($data['Reservations']);
        }
        if (\array_key_exists('SwapBytes', $data) && null !== $data['SwapBytes']) {
            $object->setSwapBytes($data['SwapBytes']);
            unset($data['SwapBytes']);
        } elseif (\array_key_exists('SwapBytes', $data) && null === $data['SwapBytes']) {
            $object->setSwapBytes(null);
            unset($data['SwapBytes']);
        }
        if (\array_key_exists('MemorySwappiness', $data) && null !== $data['MemorySwappiness']) {
            $object->setMemorySwappiness($data['MemorySwappiness']);
            unset($data['MemorySwappiness']);
        } elseif (\array_key_exists('MemorySwappiness', $data) && null === $data['MemorySwappiness']) {
            $object->setMemorySwappiness(null);
            unset($data['MemorySwappiness']);
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
        if ($data->isInitialized('limits') && null !== $data->getLimits()) {
            $dataArray['Limits'] = null === $data->getLimits() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getLimits(), 'json', $context));
        }
        if ($data->isInitialized('reservations') && null !== $data->getReservations()) {
            $dataArray['Reservations'] = null === $data->getReservations() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getReservations(), 'json', $context));
        }
        if ($data->isInitialized('swapBytes') && null !== $data->getSwapBytes()) {
            $dataArray['SwapBytes'] = $data->getSwapBytes();
        }
        if ($data->isInitialized('memorySwappiness') && null !== $data->getMemorySwappiness()) {
            $dataArray['MemorySwappiness'] = $data->getMemorySwappiness();
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
        return [\Docker\API\Model\TaskSpecResources::class => false];
    }
}
