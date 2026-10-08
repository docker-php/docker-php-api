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

class ImageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ImageSummary::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ImageSummary::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ImageSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Id', $data) && null !== $data['Id']) {
            $object->setId($data['Id']);
            unset($data['Id']);
        } elseif (\array_key_exists('Id', $data) && null === $data['Id']) {
            $object->setId(null);
            unset($data['Id']);
        }
        if (\array_key_exists('ParentId', $data) && null !== $data['ParentId']) {
            $object->setParentId($data['ParentId']);
            unset($data['ParentId']);
        } elseif (\array_key_exists('ParentId', $data) && null === $data['ParentId']) {
            $object->setParentId(null);
            unset($data['ParentId']);
        }
        if (\array_key_exists('RepoTags', $data) && null !== $data['RepoTags']) {
            $values = [];
            foreach ($data['RepoTags'] as $value) {
                $values[] = $value;
            }
            $object->setRepoTags($values);
            unset($data['RepoTags']);
        } elseif (\array_key_exists('RepoTags', $data) && null === $data['RepoTags']) {
            $object->setRepoTags(null);
            unset($data['RepoTags']);
        }
        if (\array_key_exists('RepoDigests', $data) && null !== $data['RepoDigests']) {
            $values_1 = [];
            foreach ($data['RepoDigests'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRepoDigests($values_1);
            unset($data['RepoDigests']);
        } elseif (\array_key_exists('RepoDigests', $data) && null === $data['RepoDigests']) {
            $object->setRepoDigests(null);
            unset($data['RepoDigests']);
        }
        if (\array_key_exists('Created', $data) && null !== $data['Created']) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        } elseif (\array_key_exists('Created', $data) && null === $data['Created']) {
            $object->setCreated(null);
            unset($data['Created']);
        }
        if (\array_key_exists('Size', $data) && null !== $data['Size']) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
            $object->setSize(null);
            unset($data['Size']);
        }
        if (\array_key_exists('SharedSize', $data) && null !== $data['SharedSize']) {
            $object->setSharedSize($data['SharedSize']);
            unset($data['SharedSize']);
        } elseif (\array_key_exists('SharedSize', $data) && null === $data['SharedSize']) {
            $object->setSharedSize(null);
            unset($data['SharedSize']);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values_2 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Labels'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
            unset($data['Labels']);
        }
        if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
            $object->setContainers($data['Containers']);
            unset($data['Containers']);
        } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
            $object->setContainers(null);
            unset($data['Containers']);
        }
        if (\array_key_exists('Manifests', $data) && null !== $data['Manifests']) {
            $values_3 = [];
            foreach ($data['Manifests'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\ImageManifestSummary::class, 'json', $context);
            }
            $object->setManifests($values_3);
            unset($data['Manifests']);
        } elseif (\array_key_exists('Manifests', $data) && null === $data['Manifests']) {
            $object->setManifests(null);
            unset($data['Manifests']);
        }
        foreach ($data as $key_1 => $value_4) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_4;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['Id'] = $data->getId();
        $dataArray['ParentId'] = $data->getParentId();
        $values = [];
        foreach ($data->getRepoTags() as $value) {
            $values[] = $value;
        }
        $dataArray['RepoTags'] = $values;
        $values_1 = [];
        foreach ($data->getRepoDigests() as $value_1) {
            $values_1[] = $value_1;
        }
        $dataArray['RepoDigests'] = $values_1;
        $dataArray['Created'] = $data->getCreated();
        $dataArray['Size'] = $data->getSize();
        $dataArray['SharedSize'] = $data->getSharedSize();
        $values_2 = new \Docker\API\Runtime\JsonObject();
        foreach ($data->getLabels() as $key => $value_2) {
            $values_2[$key] = $value_2;
        }
        $dataArray['Labels'] = $values_2;
        $dataArray['Containers'] = $data->getContainers();
        if ($data->isInitialized('manifests') && null !== $data->getManifests()) {
            $values_3 = [];
            foreach ($data->getManifests() as $value_3) {
                $values_3[] = null === $value_3 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_3, 'json', $context));
            }
            $dataArray['Manifests'] = $values_3;
        }
        foreach ($data->additionalPropertyEntries() as $key_1 => $value_4) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_4;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ImageSummary::class => false];
    }
}
