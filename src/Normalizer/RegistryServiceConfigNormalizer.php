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

class RegistryServiceConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\RegistryServiceConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\RegistryServiceConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\RegistryServiceConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('InsecureRegistryCIDRs', $data) && null !== $data['InsecureRegistryCIDRs']) {
            $values = [];
            foreach ($data['InsecureRegistryCIDRs'] as $value) {
                $values[] = $value;
            }
            $object->setInsecureRegistryCIDRs($values);
            unset($data['InsecureRegistryCIDRs']);
        } elseif (\array_key_exists('InsecureRegistryCIDRs', $data) && null === $data['InsecureRegistryCIDRs']) {
            $object->setInsecureRegistryCIDRs(null);
            unset($data['InsecureRegistryCIDRs']);
        }
        if (\array_key_exists('IndexConfigs', $data) && null !== $data['IndexConfigs']) {
            $values_1 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['IndexConfigs'] as $key => $value_1) {
                $values_1[$key] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\IndexInfo::class, 'json', $context);
            }
            $object->setIndexConfigs($values_1);
            unset($data['IndexConfigs']);
        } elseif (\array_key_exists('IndexConfigs', $data) && null === $data['IndexConfigs']) {
            $object->setIndexConfigs(null);
            unset($data['IndexConfigs']);
        }
        if (\array_key_exists('Mirrors', $data) && null !== $data['Mirrors']) {
            $values_2 = [];
            foreach ($data['Mirrors'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setMirrors($values_2);
            unset($data['Mirrors']);
        } elseif (\array_key_exists('Mirrors', $data) && null === $data['Mirrors']) {
            $object->setMirrors(null);
            unset($data['Mirrors']);
        }
        foreach ($data as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_3;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('insecureRegistryCIDRs') && null !== $data->getInsecureRegistryCIDRs()) {
            $values = [];
            foreach ($data->getInsecureRegistryCIDRs() as $value) {
                $values[] = $value;
            }
            $dataArray['InsecureRegistryCIDRs'] = $values;
        }
        if ($data->isInitialized('indexConfigs') && null !== $data->getIndexConfigs()) {
            $values_1 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getIndexConfigs() as $key => $value_1) {
                $values_1[$key] = null === $value_1 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['IndexConfigs'] = $values_1;
        }
        if ($data->isInitialized('mirrors') && null !== $data->getMirrors()) {
            $values_2 = [];
            foreach ($data->getMirrors() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['Mirrors'] = $values_2;
        }
        foreach ($data->additionalPropertyEntries() as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_3;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\RegistryServiceConfig::class => false];
    }
}
