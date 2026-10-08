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

class ContainerBlkioStatEntryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerBlkioStatEntry::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerBlkioStatEntry::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerBlkioStatEntry();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('major', $data) && null !== $data['major']) {
            $object->setMajor($data['major']);
            unset($data['major']);
        } elseif (\array_key_exists('major', $data) && null === $data['major']) {
            $object->setMajor(null);
            unset($data['major']);
        }
        if (\array_key_exists('minor', $data) && null !== $data['minor']) {
            $object->setMinor($data['minor']);
            unset($data['minor']);
        } elseif (\array_key_exists('minor', $data) && null === $data['minor']) {
            $object->setMinor(null);
            unset($data['minor']);
        }
        if (\array_key_exists('op', $data) && null !== $data['op']) {
            $object->setOp($data['op']);
            unset($data['op']);
        } elseif (\array_key_exists('op', $data) && null === $data['op']) {
            $object->setOp(null);
            unset($data['op']);
        }
        if (\array_key_exists('value', $data) && null !== $data['value']) {
            $object->setValue($data['value']);
            unset($data['value']);
        } elseif (\array_key_exists('value', $data) && null === $data['value']) {
            $object->setValue(null);
            unset($data['value']);
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
        if ($data->isInitialized('major') && null !== $data->getMajor()) {
            $dataArray['major'] = $data->getMajor();
        }
        if ($data->isInitialized('minor') && null !== $data->getMinor()) {
            $dataArray['minor'] = $data->getMinor();
        }
        if ($data->isInitialized('op') && null !== $data->getOp()) {
            $dataArray['op'] = $data->getOp();
        }
        if ($data->isInitialized('value') && null !== $data->getValue()) {
            $dataArray['value'] = $data->getValue();
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
        return [\Docker\API\Model\ContainerBlkioStatEntry::class => false];
    }
}
