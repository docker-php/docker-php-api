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

class ContainerStatsResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerStatsResponse::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerStatsResponse::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerStatsResponse();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('os_type', $data) && null !== $data['os_type']) {
            $object->setOsType($data['os_type']);
            unset($data['os_type']);
        } elseif (\array_key_exists('os_type', $data) && null === $data['os_type']) {
            $object->setOsType(null);
            unset($data['os_type']);
        }
        if (\array_key_exists('read', $data) && null !== $data['read']) {
            $object->setRead('Z' === (new \DateTime($data['read']))->getTimezone()->getName() ? (new \DateTime($data['read']))->setTimezone(new \DateTimeZone('GMT')) : new \DateTime($data['read']));
            unset($data['read']);
        } elseif (\array_key_exists('read', $data) && null === $data['read']) {
            $object->setRead(null);
            unset($data['read']);
        }
        if (\array_key_exists('cpu_stats', $data) && null !== $data['cpu_stats']) {
            $object->setCpuStats($this->denormalizer->denormalize($data['cpu_stats'], \Docker\API\Model\ContainerCPUStats::class, 'json', $context));
            unset($data['cpu_stats']);
        } elseif (\array_key_exists('cpu_stats', $data) && null === $data['cpu_stats']) {
            $object->setCpuStats(null);
            unset($data['cpu_stats']);
        }
        if (\array_key_exists('memory_stats', $data) && null !== $data['memory_stats']) {
            $object->setMemoryStats($this->denormalizer->denormalize($data['memory_stats'], \Docker\API\Model\ContainerMemoryStats::class, 'json', $context));
            unset($data['memory_stats']);
        } elseif (\array_key_exists('memory_stats', $data) && null === $data['memory_stats']) {
            $object->setMemoryStats(null);
            unset($data['memory_stats']);
        }
        if (\array_key_exists('networks', $data) && null !== $data['networks']) {
            $object->setNetworks($data['networks']);
            unset($data['networks']);
        } elseif (\array_key_exists('networks', $data) && null === $data['networks']) {
            $object->setNetworks(null);
            unset($data['networks']);
        }
        if (\array_key_exists('pids_stats', $data) && null !== $data['pids_stats']) {
            $object->setPidsStats($this->denormalizer->denormalize($data['pids_stats'], \Docker\API\Model\ContainerPidsStats::class, 'json', $context));
            unset($data['pids_stats']);
        } elseif (\array_key_exists('pids_stats', $data) && null === $data['pids_stats']) {
            $object->setPidsStats(null);
            unset($data['pids_stats']);
        }
        if (\array_key_exists('blkio_stats', $data) && null !== $data['blkio_stats']) {
            $object->setBlkioStats($this->denormalizer->denormalize($data['blkio_stats'], \Docker\API\Model\ContainerBlkioStats::class, 'json', $context));
            unset($data['blkio_stats']);
        } elseif (\array_key_exists('blkio_stats', $data) && null === $data['blkio_stats']) {
            $object->setBlkioStats(null);
            unset($data['blkio_stats']);
        }
        if (\array_key_exists('num_procs', $data) && null !== $data['num_procs']) {
            $object->setNumProcs($data['num_procs']);
            unset($data['num_procs']);
        } elseif (\array_key_exists('num_procs', $data) && null === $data['num_procs']) {
            $object->setNumProcs(null);
            unset($data['num_procs']);
        }
        if (\array_key_exists('storage_stats', $data) && null !== $data['storage_stats']) {
            $object->setStorageStats($this->denormalizer->denormalize($data['storage_stats'], \Docker\API\Model\ContainerStorageStats::class, 'json', $context));
            unset($data['storage_stats']);
        } elseif (\array_key_exists('storage_stats', $data) && null === $data['storage_stats']) {
            $object->setStorageStats(null);
            unset($data['storage_stats']);
        }
        if (\array_key_exists('preread', $data) && null !== $data['preread']) {
            $object->setPreread('Z' === (new \DateTime($data['preread']))->getTimezone()->getName() ? (new \DateTime($data['preread']))->setTimezone(new \DateTimeZone('GMT')) : new \DateTime($data['preread']));
            unset($data['preread']);
        } elseif (\array_key_exists('preread', $data) && null === $data['preread']) {
            $object->setPreread(null);
            unset($data['preread']);
        }
        if (\array_key_exists('precpu_stats', $data) && null !== $data['precpu_stats']) {
            $object->setPrecpuStats($this->denormalizer->denormalize($data['precpu_stats'], \Docker\API\Model\ContainerCPUStats::class, 'json', $context));
            unset($data['precpu_stats']);
        } elseif (\array_key_exists('precpu_stats', $data) && null === $data['precpu_stats']) {
            $object->setPrecpuStats(null);
            unset($data['precpu_stats']);
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
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['id'] = $data->getId();
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('osType') && null !== $data->getOsType()) {
            $dataArray['os_type'] = $data->getOsType();
        }
        if ($data->isInitialized('read') && null !== $data->getRead()) {
            $dataArray['read'] = $data->getRead()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('cpuStats') && null !== $data->getCpuStats()) {
            $dataArray['cpu_stats'] = null === $data->getCpuStats() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getCpuStats(), 'json', $context));
        }
        if ($data->isInitialized('memoryStats') && null !== $data->getMemoryStats()) {
            $dataArray['memory_stats'] = null === $data->getMemoryStats() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getMemoryStats(), 'json', $context));
        }
        if ($data->isInitialized('networks') && null !== $data->getNetworks()) {
            $dataArray['networks'] = $data->getNetworks();
        }
        if ($data->isInitialized('pidsStats') && null !== $data->getPidsStats()) {
            $dataArray['pids_stats'] = null === $data->getPidsStats() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getPidsStats(), 'json', $context));
        }
        if ($data->isInitialized('blkioStats') && null !== $data->getBlkioStats()) {
            $dataArray['blkio_stats'] = null === $data->getBlkioStats() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getBlkioStats(), 'json', $context));
        }
        if ($data->isInitialized('numProcs') && null !== $data->getNumProcs()) {
            $dataArray['num_procs'] = $data->getNumProcs();
        }
        if ($data->isInitialized('storageStats') && null !== $data->getStorageStats()) {
            $dataArray['storage_stats'] = null === $data->getStorageStats() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getStorageStats(), 'json', $context));
        }
        if ($data->isInitialized('preread') && null !== $data->getPreread()) {
            $dataArray['preread'] = $data->getPreread()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('precpuStats') && null !== $data->getPrecpuStats()) {
            $dataArray['precpu_stats'] = null === $data->getPrecpuStats() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getPrecpuStats(), 'json', $context));
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
        return [\Docker\API\Model\ContainerStatsResponse::class => false];
    }
}
