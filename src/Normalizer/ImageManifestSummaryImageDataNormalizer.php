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

class ImageManifestSummaryImageDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ImageManifestSummaryImageData::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ImageManifestSummaryImageData::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ImageManifestSummaryImageData();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Platform', $data) && null !== $data['Platform']) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], \Docker\API\Model\OCIPlatform::class, 'json', $context));
            unset($data['Platform']);
        } elseif (\array_key_exists('Platform', $data) && null === $data['Platform']) {
            $object->setPlatform(null);
            unset($data['Platform']);
        }
        if (\array_key_exists('Identity', $data) && null !== $data['Identity']) {
            $object->setIdentity($this->denormalizer->denormalize($data['Identity'], \Docker\API\Model\Identity::class, 'json', $context));
            unset($data['Identity']);
        } elseif (\array_key_exists('Identity', $data) && null === $data['Identity']) {
            $object->setIdentity(null);
            unset($data['Identity']);
        }
        if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
            $values = [];
            foreach ($data['Containers'] as $value) {
                $values[] = $value;
            }
            $object->setContainers($values);
            unset($data['Containers']);
        } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
            $object->setContainers(null);
            unset($data['Containers']);
        }
        if (\array_key_exists('Size', $data) && null !== $data['Size']) {
            $object->setSize($this->denormalizer->denormalize($data['Size'], \Docker\API\Model\ImageManifestSummaryImageDataSize::class, 'json', $context));
            unset($data['Size']);
        } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
            $object->setSize(null);
            unset($data['Size']);
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
        $dataArray['Platform'] = null === $data->getPlatform() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getPlatform(), 'json', $context));
        if ($data->isInitialized('identity') && null !== $data->getIdentity()) {
            $dataArray['Identity'] = null === $data->getIdentity() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getIdentity(), 'json', $context));
        }
        $values = [];
        foreach ($data->getContainers() as $value) {
            $values[] = $value;
        }
        $dataArray['Containers'] = $values;
        $dataArray['Size'] = null === $data->getSize() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getSize(), 'json', $context));
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ImageManifestSummaryImageData::class => false];
    }
}
