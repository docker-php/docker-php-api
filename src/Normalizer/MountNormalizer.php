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

class MountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Mount::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Mount::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\Mount();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('ReadOnly', $data) && \is_int($data['ReadOnly'])) {
            $data['ReadOnly'] = (bool) $data['ReadOnly'];
        }
        if (\array_key_exists('Target', $data) && null !== $data['Target']) {
            $object->setTarget($data['Target']);
            unset($data['Target']);
        } elseif (\array_key_exists('Target', $data) && null === $data['Target']) {
            $object->setTarget(null);
            unset($data['Target']);
        }
        if (\array_key_exists('Source', $data) && null !== $data['Source']) {
            $object->setSource($data['Source']);
            unset($data['Source']);
        } elseif (\array_key_exists('Source', $data) && null === $data['Source']) {
            $object->setSource(null);
            unset($data['Source']);
        }
        if (\array_key_exists('Type', $data) && null !== $data['Type']) {
            $object->setType($data['Type']);
            unset($data['Type']);
        } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
            $object->setType(null);
            unset($data['Type']);
        }
        if (\array_key_exists('ReadOnly', $data) && null !== $data['ReadOnly']) {
            $object->setReadOnly($data['ReadOnly']);
            unset($data['ReadOnly']);
        } elseif (\array_key_exists('ReadOnly', $data) && null === $data['ReadOnly']) {
            $object->setReadOnly(null);
            unset($data['ReadOnly']);
        }
        if (\array_key_exists('Consistency', $data) && null !== $data['Consistency']) {
            $object->setConsistency($data['Consistency']);
            unset($data['Consistency']);
        } elseif (\array_key_exists('Consistency', $data) && null === $data['Consistency']) {
            $object->setConsistency(null);
            unset($data['Consistency']);
        }
        if (\array_key_exists('BindOptions', $data) && null !== $data['BindOptions']) {
            $object->setBindOptions($this->denormalizer->denormalize($data['BindOptions'], \Docker\API\Model\MountBindOptions::class, 'json', $context));
            unset($data['BindOptions']);
        } elseif (\array_key_exists('BindOptions', $data) && null === $data['BindOptions']) {
            $object->setBindOptions(null);
            unset($data['BindOptions']);
        }
        if (\array_key_exists('VolumeOptions', $data) && null !== $data['VolumeOptions']) {
            $object->setVolumeOptions($this->denormalizer->denormalize($data['VolumeOptions'], \Docker\API\Model\MountVolumeOptions::class, 'json', $context));
            unset($data['VolumeOptions']);
        } elseif (\array_key_exists('VolumeOptions', $data) && null === $data['VolumeOptions']) {
            $object->setVolumeOptions(null);
            unset($data['VolumeOptions']);
        }
        if (\array_key_exists('ImageOptions', $data) && null !== $data['ImageOptions']) {
            $object->setImageOptions($this->denormalizer->denormalize($data['ImageOptions'], \Docker\API\Model\MountImageOptions::class, 'json', $context));
            unset($data['ImageOptions']);
        } elseif (\array_key_exists('ImageOptions', $data) && null === $data['ImageOptions']) {
            $object->setImageOptions(null);
            unset($data['ImageOptions']);
        }
        if (\array_key_exists('TmpfsOptions', $data) && null !== $data['TmpfsOptions']) {
            $object->setTmpfsOptions($this->denormalizer->denormalize($data['TmpfsOptions'], \Docker\API\Model\MountTmpfsOptions::class, 'json', $context));
            unset($data['TmpfsOptions']);
        } elseif (\array_key_exists('TmpfsOptions', $data) && null === $data['TmpfsOptions']) {
            $object->setTmpfsOptions(null);
            unset($data['TmpfsOptions']);
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
        if ($data->isInitialized('target') && null !== $data->getTarget()) {
            $dataArray['Target'] = $data->getTarget();
        }
        if ($data->isInitialized('source') && null !== $data->getSource()) {
            $dataArray['Source'] = $data->getSource();
        }
        if ($data->isInitialized('type') && null !== $data->getType()) {
            $dataArray['Type'] = $data->getType();
        }
        if ($data->isInitialized('readOnly') && null !== $data->getReadOnly()) {
            $dataArray['ReadOnly'] = $data->getReadOnly();
        }
        if ($data->isInitialized('consistency') && null !== $data->getConsistency()) {
            $dataArray['Consistency'] = $data->getConsistency();
        }
        if ($data->isInitialized('bindOptions') && null !== $data->getBindOptions()) {
            $dataArray['BindOptions'] = null === $data->getBindOptions() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getBindOptions(), 'json', $context));
        }
        if ($data->isInitialized('volumeOptions') && null !== $data->getVolumeOptions()) {
            $dataArray['VolumeOptions'] = null === $data->getVolumeOptions() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getVolumeOptions(), 'json', $context));
        }
        if ($data->isInitialized('imageOptions') && null !== $data->getImageOptions()) {
            $dataArray['ImageOptions'] = null === $data->getImageOptions() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getImageOptions(), 'json', $context));
        }
        if ($data->isInitialized('tmpfsOptions') && null !== $data->getTmpfsOptions()) {
            $dataArray['TmpfsOptions'] = null === $data->getTmpfsOptions() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getTmpfsOptions(), 'json', $context));
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
        return [\Docker\API\Model\Mount::class => false];
    }
}
