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

class ImageInspectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ImageInspect::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ImageInspect::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ImageInspect();
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
        if (\array_key_exists('Parent', $data) && null !== $data['Parent']) {
            $object->setParent($data['Parent']);
            unset($data['Parent']);
        } elseif (\array_key_exists('Parent', $data) && null === $data['Parent']) {
            $object->setParent(null);
            unset($data['Parent']);
        }
        if (\array_key_exists('Comment', $data) && null !== $data['Comment']) {
            $object->setComment($data['Comment']);
            unset($data['Comment']);
        } elseif (\array_key_exists('Comment', $data) && null === $data['Comment']) {
            $object->setComment(null);
            unset($data['Comment']);
        }
        if (\array_key_exists('Created', $data) && null !== $data['Created']) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        } elseif (\array_key_exists('Created', $data) && null === $data['Created']) {
            $object->setCreated(null);
            unset($data['Created']);
        }
        if (\array_key_exists('DockerVersion', $data) && null !== $data['DockerVersion']) {
            $object->setDockerVersion($data['DockerVersion']);
            unset($data['DockerVersion']);
        } elseif (\array_key_exists('DockerVersion', $data) && null === $data['DockerVersion']) {
            $object->setDockerVersion(null);
            unset($data['DockerVersion']);
        }
        if (\array_key_exists('Author', $data) && null !== $data['Author']) {
            $object->setAuthor($data['Author']);
            unset($data['Author']);
        } elseif (\array_key_exists('Author', $data) && null === $data['Author']) {
            $object->setAuthor(null);
            unset($data['Author']);
        }
        if (\array_key_exists('Config', $data) && null !== $data['Config']) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], \Docker\API\Model\ImageConfig::class, 'json', $context));
            unset($data['Config']);
        } elseif (\array_key_exists('Config', $data) && null === $data['Config']) {
            $object->setConfig(null);
            unset($data['Config']);
        }
        if (\array_key_exists('Architecture', $data) && null !== $data['Architecture']) {
            $object->setArchitecture($data['Architecture']);
            unset($data['Architecture']);
        } elseif (\array_key_exists('Architecture', $data) && null === $data['Architecture']) {
            $object->setArchitecture(null);
            unset($data['Architecture']);
        }
        if (\array_key_exists('Variant', $data) && null !== $data['Variant']) {
            $object->setVariant($data['Variant']);
            unset($data['Variant']);
        } elseif (\array_key_exists('Variant', $data) && null === $data['Variant']) {
            $object->setVariant(null);
            unset($data['Variant']);
        }
        if (\array_key_exists('Os', $data) && null !== $data['Os']) {
            $object->setOs($data['Os']);
            unset($data['Os']);
        } elseif (\array_key_exists('Os', $data) && null === $data['Os']) {
            $object->setOs(null);
            unset($data['Os']);
        }
        if (\array_key_exists('OsVersion', $data) && null !== $data['OsVersion']) {
            $object->setOsVersion($data['OsVersion']);
            unset($data['OsVersion']);
        } elseif (\array_key_exists('OsVersion', $data) && null === $data['OsVersion']) {
            $object->setOsVersion(null);
            unset($data['OsVersion']);
        }
        if (\array_key_exists('Size', $data) && null !== $data['Size']) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
            $object->setSize(null);
            unset($data['Size']);
        }
        if (\array_key_exists('GraphDriver', $data) && null !== $data['GraphDriver']) {
            $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], \Docker\API\Model\DriverData::class, 'json', $context));
            unset($data['GraphDriver']);
        } elseif (\array_key_exists('GraphDriver', $data) && null === $data['GraphDriver']) {
            $object->setGraphDriver(null);
            unset($data['GraphDriver']);
        }
        if (\array_key_exists('RootFS', $data) && null !== $data['RootFS']) {
            $object->setRootFS($this->denormalizer->denormalize($data['RootFS'], \Docker\API\Model\ImageInspectRootFS::class, 'json', $context));
            unset($data['RootFS']);
        } elseif (\array_key_exists('RootFS', $data) && null === $data['RootFS']) {
            $object->setRootFS(null);
            unset($data['RootFS']);
        }
        if (\array_key_exists('Metadata', $data) && null !== $data['Metadata']) {
            $object->setMetadata($this->denormalizer->denormalize($data['Metadata'], \Docker\API\Model\ImageInspectMetadata::class, 'json', $context));
            unset($data['Metadata']);
        } elseif (\array_key_exists('Metadata', $data) && null === $data['Metadata']) {
            $object->setMetadata(null);
            unset($data['Metadata']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['Id'] = $data->getId();
        }
        if ($data->isInitialized('repoTags') && null !== $data->getRepoTags()) {
            $values = [];
            foreach ($data->getRepoTags() as $value) {
                $values[] = $value;
            }
            $dataArray['RepoTags'] = $values;
        }
        if ($data->isInitialized('repoDigests') && null !== $data->getRepoDigests()) {
            $values_1 = [];
            foreach ($data->getRepoDigests() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['RepoDigests'] = $values_1;
        }
        if ($data->isInitialized('parent') && null !== $data->getParent()) {
            $dataArray['Parent'] = $data->getParent();
        }
        if ($data->isInitialized('comment') && null !== $data->getComment()) {
            $dataArray['Comment'] = $data->getComment();
        }
        if ($data->isInitialized('created') && null !== $data->getCreated()) {
            $dataArray['Created'] = $data->getCreated();
        }
        if ($data->isInitialized('dockerVersion') && null !== $data->getDockerVersion()) {
            $dataArray['DockerVersion'] = $data->getDockerVersion();
        }
        if ($data->isInitialized('author') && null !== $data->getAuthor()) {
            $dataArray['Author'] = $data->getAuthor();
        }
        if ($data->isInitialized('config') && null !== $data->getConfig()) {
            $dataArray['Config'] = null === $data->getConfig() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getConfig(), 'json', $context));
        }
        if ($data->isInitialized('architecture') && null !== $data->getArchitecture()) {
            $dataArray['Architecture'] = $data->getArchitecture();
        }
        if ($data->isInitialized('variant') && null !== $data->getVariant()) {
            $dataArray['Variant'] = $data->getVariant();
        }
        if ($data->isInitialized('os') && null !== $data->getOs()) {
            $dataArray['Os'] = $data->getOs();
        }
        if ($data->isInitialized('osVersion') && null !== $data->getOsVersion()) {
            $dataArray['OsVersion'] = $data->getOsVersion();
        }
        if ($data->isInitialized('size') && null !== $data->getSize()) {
            $dataArray['Size'] = $data->getSize();
        }
        if ($data->isInitialized('graphDriver') && null !== $data->getGraphDriver()) {
            $dataArray['GraphDriver'] = null === $data->getGraphDriver() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getGraphDriver(), 'json', $context));
        }
        if ($data->isInitialized('rootFS') && null !== $data->getRootFS()) {
            $dataArray['RootFS'] = null === $data->getRootFS() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getRootFS(), 'json', $context));
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $dataArray['Metadata'] = null === $data->getMetadata() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getMetadata(), 'json', $context));
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ImageInspect::class => false];
    }
}
