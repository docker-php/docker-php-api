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

class SubnetStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SubnetStatus::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SubnetStatus::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\SubnetStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('IPsInUse', $data) && null !== $data['IPsInUse']) {
            $object->setIPsInUse($data['IPsInUse']);
            unset($data['IPsInUse']);
        } elseif (\array_key_exists('IPsInUse', $data) && null === $data['IPsInUse']) {
            $object->setIPsInUse(null);
            unset($data['IPsInUse']);
        }
        if (\array_key_exists('DynamicIPsAvailable', $data) && null !== $data['DynamicIPsAvailable']) {
            $object->setDynamicIPsAvailable($data['DynamicIPsAvailable']);
            unset($data['DynamicIPsAvailable']);
        } elseif (\array_key_exists('DynamicIPsAvailable', $data) && null === $data['DynamicIPsAvailable']) {
            $object->setDynamicIPsAvailable(null);
            unset($data['DynamicIPsAvailable']);
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
        if ($data->isInitialized('iPsInUse') && null !== $data->getIPsInUse()) {
            $dataArray['IPsInUse'] = $data->getIPsInUse();
        }
        if ($data->isInitialized('dynamicIPsAvailable') && null !== $data->getDynamicIPsAvailable()) {
            $dataArray['DynamicIPsAvailable'] = $data->getDynamicIPsAvailable();
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
        return [\Docker\API\Model\SubnetStatus::class => false];
    }
}
