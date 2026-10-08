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

class OCIDescriptorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\OCIDescriptor::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\OCIDescriptor::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\OCIDescriptor();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('mediaType', $data) && null !== $data['mediaType']) {
            $object->setMediaType($data['mediaType']);
            unset($data['mediaType']);
        } elseif (\array_key_exists('mediaType', $data) && null === $data['mediaType']) {
            $object->setMediaType(null);
            unset($data['mediaType']);
        }
        if (\array_key_exists('digest', $data) && null !== $data['digest']) {
            $object->setDigest($data['digest']);
            unset($data['digest']);
        } elseif (\array_key_exists('digest', $data) && null === $data['digest']) {
            $object->setDigest(null);
            unset($data['digest']);
        }
        if (\array_key_exists('size', $data) && null !== $data['size']) {
            $object->setSize($data['size']);
            unset($data['size']);
        } elseif (\array_key_exists('size', $data) && null === $data['size']) {
            $object->setSize(null);
            unset($data['size']);
        }
        if (\array_key_exists('urls', $data) && null !== $data['urls']) {
            $values = [];
            foreach ($data['urls'] as $value) {
                $values[] = $value;
            }
            $object->setUrls($values);
            unset($data['urls']);
        } elseif (\array_key_exists('urls', $data) && null === $data['urls']) {
            $object->setUrls(null);
            unset($data['urls']);
        }
        if (\array_key_exists('annotations', $data) && null !== $data['annotations']) {
            $values_1 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['annotations'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setAnnotations($values_1);
            unset($data['annotations']);
        } elseif (\array_key_exists('annotations', $data) && null === $data['annotations']) {
            $object->setAnnotations(null);
            unset($data['annotations']);
        }
        if (\array_key_exists('data', $data) && null !== $data['data']) {
            $object->setData($data['data']);
            unset($data['data']);
        } elseif (\array_key_exists('data', $data) && null === $data['data']) {
            $object->setData(null);
            unset($data['data']);
        }
        if (\array_key_exists('platform', $data) && null !== $data['platform']) {
            $object->setPlatform($this->denormalizer->denormalize($data['platform'], \Docker\API\Model\OCIPlatform::class, 'json', $context));
            unset($data['platform']);
        } elseif (\array_key_exists('platform', $data) && null === $data['platform']) {
            $object->setPlatform(null);
            unset($data['platform']);
        }
        if (\array_key_exists('artifactType', $data) && null !== $data['artifactType']) {
            $object->setArtifactType($data['artifactType']);
            unset($data['artifactType']);
        } elseif (\array_key_exists('artifactType', $data) && null === $data['artifactType']) {
            $object->setArtifactType(null);
            unset($data['artifactType']);
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('mediaType') && null !== $data->getMediaType()) {
            $dataArray['mediaType'] = $data->getMediaType();
        }
        if ($data->isInitialized('digest') && null !== $data->getDigest()) {
            $dataArray['digest'] = $data->getDigest();
        }
        if ($data->isInitialized('size') && null !== $data->getSize()) {
            $dataArray['size'] = $data->getSize();
        }
        if ($data->isInitialized('urls') && null !== $data->getUrls()) {
            $values = [];
            foreach ($data->getUrls() as $value) {
                $values[] = $value;
            }
            $dataArray['urls'] = $values;
        }
        if ($data->isInitialized('annotations') && null !== $data->getAnnotations()) {
            $values_1 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getAnnotations() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['annotations'] = $values_1;
        }
        if ($data->isInitialized('data') && null !== $data->getData()) {
            $dataArray['data'] = $data->getData();
        }
        if ($data->isInitialized('platform') && null !== $data->getPlatform()) {
            $dataArray['platform'] = null === $data->getPlatform() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getPlatform(), 'json', $context));
        }
        if ($data->isInitialized('artifactType') && null !== $data->getArtifactType()) {
            $dataArray['artifactType'] = $data->getArtifactType();
        }
        foreach ($data->additionalPropertyEntries() as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\OCIDescriptor::class => false];
    }
}
