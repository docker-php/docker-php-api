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

class IdentityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Identity::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Identity::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\Identity();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Signature', $data) && null !== $data['Signature']) {
            $values = [];
            foreach ($data['Signature'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\SignatureIdentity::class, 'json', $context);
            }
            $object->setSignature($values);
            unset($data['Signature']);
        } elseif (\array_key_exists('Signature', $data) && null === $data['Signature']) {
            $object->setSignature(null);
            unset($data['Signature']);
        }
        if (\array_key_exists('Pull', $data) && null !== $data['Pull']) {
            $values_1 = [];
            foreach ($data['Pull'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\PullIdentity::class, 'json', $context);
            }
            $object->setPull($values_1);
            unset($data['Pull']);
        } elseif (\array_key_exists('Pull', $data) && null === $data['Pull']) {
            $object->setPull(null);
            unset($data['Pull']);
        }
        if (\array_key_exists('Build', $data) && null !== $data['Build']) {
            $values_2 = [];
            foreach ($data['Build'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\BuildIdentity::class, 'json', $context);
            }
            $object->setBuild($values_2);
            unset($data['Build']);
        } elseif (\array_key_exists('Build', $data) && null === $data['Build']) {
            $object->setBuild(null);
            unset($data['Build']);
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_3;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('signature') && null !== $data->getSignature()) {
            $values = [];
            foreach ($data->getSignature() as $value) {
                $values[] = null === $value ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['Signature'] = $values;
        }
        if ($data->isInitialized('pull') && null !== $data->getPull()) {
            $values_1 = [];
            foreach ($data->getPull() as $value_1) {
                $values_1[] = null === $value_1 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['Pull'] = $values_1;
        }
        if ($data->isInitialized('build') && null !== $data->getBuild()) {
            $values_2 = [];
            foreach ($data->getBuild() as $value_2) {
                $values_2[] = null === $value_2 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_2, 'json', $context));
            }
            $dataArray['Build'] = $values_2;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_3;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\Identity::class => false];
    }
}
