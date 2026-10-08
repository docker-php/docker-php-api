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

class NetworkSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\NetworkSettings::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\NetworkSettings::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\NetworkSettings();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('SandboxID', $data) && null !== $data['SandboxID']) {
            $object->setSandboxID($data['SandboxID']);
            unset($data['SandboxID']);
        } elseif (\array_key_exists('SandboxID', $data) && null === $data['SandboxID']) {
            $object->setSandboxID(null);
            unset($data['SandboxID']);
        }
        if (\array_key_exists('SandboxKey', $data) && null !== $data['SandboxKey']) {
            $object->setSandboxKey($data['SandboxKey']);
            unset($data['SandboxKey']);
        } elseif (\array_key_exists('SandboxKey', $data) && null === $data['SandboxKey']) {
            $object->setSandboxKey(null);
            unset($data['SandboxKey']);
        }
        if (\array_key_exists('Ports', $data) && null !== $data['Ports']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Ports'] as $key => $value) {
                if (null === $value) {
                    $values[$key] = null;
                    continue;
                }
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\PortBinding::class, 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $object->setPorts($values);
            unset($data['Ports']);
        } elseif (\array_key_exists('Ports', $data) && null === $data['Ports']) {
            $object->setPorts(null);
            unset($data['Ports']);
        }
        if (\array_key_exists('Networks', $data) && null !== $data['Networks']) {
            $values_2 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Networks'] as $key_1 => $value_2) {
                $values_2[$key_1] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\EndpointSettings::class, 'json', $context);
            }
            $object->setNetworks($values_2);
            unset($data['Networks']);
        } elseif (\array_key_exists('Networks', $data) && null === $data['Networks']) {
            $object->setNetworks(null);
            unset($data['Networks']);
        }
        foreach ($data as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_3;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('sandboxID') && null !== $data->getSandboxID()) {
            $dataArray['SandboxID'] = $data->getSandboxID();
        }
        if ($data->isInitialized('sandboxKey') && null !== $data->getSandboxKey()) {
            $dataArray['SandboxKey'] = $data->getSandboxKey();
        }
        if ($data->isInitialized('ports') && null !== $data->getPorts()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getPorts() as $key => $value) {
                if (null === $value) {
                    $values[$key] = null;
                    continue;
                }
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = null === $value_1 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_1, 'json', $context));
                }
                $values[$key] = $values_1;
            }
            $dataArray['Ports'] = $values;
        }
        if ($data->isInitialized('networks') && null !== $data->getNetworks()) {
            $values_2 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getNetworks() as $key_1 => $value_2) {
                $values_2[$key_1] = null === $value_2 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_2, 'json', $context));
            }
            $dataArray['Networks'] = $values_2;
        }
        foreach ($data->additionalPropertyEntries() as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $dataArray[$key_2] = $value_3;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\NetworkSettings::class => false];
    }
}
