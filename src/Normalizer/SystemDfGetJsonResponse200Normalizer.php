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

class SystemDfGetJsonResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SystemDfGetJsonResponse200::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SystemDfGetJsonResponse200::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\SystemDfGetJsonResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('ImageUsage', $data) && null !== $data['ImageUsage']) {
            $object->setImageUsage($this->denormalizer->denormalize($data['ImageUsage'], \Docker\API\Model\ImagesDiskUsage::class, 'json', $context));
            unset($data['ImageUsage']);
        } elseif (\array_key_exists('ImageUsage', $data) && null === $data['ImageUsage']) {
            $object->setImageUsage(null);
            unset($data['ImageUsage']);
        }
        if (\array_key_exists('ContainerUsage', $data) && null !== $data['ContainerUsage']) {
            $object->setContainerUsage($this->denormalizer->denormalize($data['ContainerUsage'], \Docker\API\Model\ContainersDiskUsage::class, 'json', $context));
            unset($data['ContainerUsage']);
        } elseif (\array_key_exists('ContainerUsage', $data) && null === $data['ContainerUsage']) {
            $object->setContainerUsage(null);
            unset($data['ContainerUsage']);
        }
        if (\array_key_exists('VolumeUsage', $data) && null !== $data['VolumeUsage']) {
            $object->setVolumeUsage($this->denormalizer->denormalize($data['VolumeUsage'], \Docker\API\Model\VolumesDiskUsage::class, 'json', $context));
            unset($data['VolumeUsage']);
        } elseif (\array_key_exists('VolumeUsage', $data) && null === $data['VolumeUsage']) {
            $object->setVolumeUsage(null);
            unset($data['VolumeUsage']);
        }
        if (\array_key_exists('BuildCacheUsage', $data) && null !== $data['BuildCacheUsage']) {
            $object->setBuildCacheUsage($this->denormalizer->denormalize($data['BuildCacheUsage'], \Docker\API\Model\BuildCacheDiskUsage::class, 'json', $context));
            unset($data['BuildCacheUsage']);
        } elseif (\array_key_exists('BuildCacheUsage', $data) && null === $data['BuildCacheUsage']) {
            $object->setBuildCacheUsage(null);
            unset($data['BuildCacheUsage']);
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
        if ($data->isInitialized('imageUsage') && null !== $data->getImageUsage()) {
            $dataArray['ImageUsage'] = null === $data->getImageUsage() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getImageUsage(), 'json', $context));
        }
        if ($data->isInitialized('containerUsage') && null !== $data->getContainerUsage()) {
            $dataArray['ContainerUsage'] = null === $data->getContainerUsage() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getContainerUsage(), 'json', $context));
        }
        if ($data->isInitialized('volumeUsage') && null !== $data->getVolumeUsage()) {
            $dataArray['VolumeUsage'] = null === $data->getVolumeUsage() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getVolumeUsage(), 'json', $context));
        }
        if ($data->isInitialized('buildCacheUsage') && null !== $data->getBuildCacheUsage()) {
            $dataArray['BuildCacheUsage'] = null === $data->getBuildCacheUsage() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getBuildCacheUsage(), 'json', $context));
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
        return [\Docker\API\Model\SystemDfGetJsonResponse200::class => false];
    }
}
