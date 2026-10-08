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

class ContainerMemoryStatsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerMemoryStats::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerMemoryStats::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerMemoryStats();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('usage', $data) && null !== $data['usage']) {
            $object->setUsage($data['usage']);
            unset($data['usage']);
        } elseif (\array_key_exists('usage', $data) && null === $data['usage']) {
            $object->setUsage(null);
            unset($data['usage']);
        }
        if (\array_key_exists('max_usage', $data) && null !== $data['max_usage']) {
            $object->setMaxUsage($data['max_usage']);
            unset($data['max_usage']);
        } elseif (\array_key_exists('max_usage', $data) && null === $data['max_usage']) {
            $object->setMaxUsage(null);
            unset($data['max_usage']);
        }
        if (\array_key_exists('stats', $data) && null !== $data['stats']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['stats'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setStats($values);
            unset($data['stats']);
        } elseif (\array_key_exists('stats', $data) && null === $data['stats']) {
            $object->setStats(null);
            unset($data['stats']);
        }
        if (\array_key_exists('failcnt', $data) && null !== $data['failcnt']) {
            $object->setFailcnt($data['failcnt']);
            unset($data['failcnt']);
        } elseif (\array_key_exists('failcnt', $data) && null === $data['failcnt']) {
            $object->setFailcnt(null);
            unset($data['failcnt']);
        }
        if (\array_key_exists('limit', $data) && null !== $data['limit']) {
            $object->setLimit($data['limit']);
            unset($data['limit']);
        } elseif (\array_key_exists('limit', $data) && null === $data['limit']) {
            $object->setLimit(null);
            unset($data['limit']);
        }
        if (\array_key_exists('commitbytes', $data) && null !== $data['commitbytes']) {
            $object->setCommitbytes($data['commitbytes']);
            unset($data['commitbytes']);
        } elseif (\array_key_exists('commitbytes', $data) && null === $data['commitbytes']) {
            $object->setCommitbytes(null);
            unset($data['commitbytes']);
        }
        if (\array_key_exists('commitpeakbytes', $data) && null !== $data['commitpeakbytes']) {
            $object->setCommitpeakbytes($data['commitpeakbytes']);
            unset($data['commitpeakbytes']);
        } elseif (\array_key_exists('commitpeakbytes', $data) && null === $data['commitpeakbytes']) {
            $object->setCommitpeakbytes(null);
            unset($data['commitpeakbytes']);
        }
        if (\array_key_exists('privateworkingset', $data) && null !== $data['privateworkingset']) {
            $object->setPrivateworkingset($data['privateworkingset']);
            unset($data['privateworkingset']);
        } elseif (\array_key_exists('privateworkingset', $data) && null === $data['privateworkingset']) {
            $object->setPrivateworkingset(null);
            unset($data['privateworkingset']);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('usage') && null !== $data->getUsage()) {
            $dataArray['usage'] = $data->getUsage();
        }
        if ($data->isInitialized('maxUsage') && null !== $data->getMaxUsage()) {
            $dataArray['max_usage'] = $data->getMaxUsage();
        }
        if ($data->isInitialized('stats') && null !== $data->getStats()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getStats() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['stats'] = $values;
        }
        if ($data->isInitialized('failcnt') && null !== $data->getFailcnt()) {
            $dataArray['failcnt'] = $data->getFailcnt();
        }
        if ($data->isInitialized('limit') && null !== $data->getLimit()) {
            $dataArray['limit'] = $data->getLimit();
        }
        if ($data->isInitialized('commitbytes') && null !== $data->getCommitbytes()) {
            $dataArray['commitbytes'] = $data->getCommitbytes();
        }
        if ($data->isInitialized('commitpeakbytes') && null !== $data->getCommitpeakbytes()) {
            $dataArray['commitpeakbytes'] = $data->getCommitpeakbytes();
        }
        if ($data->isInitialized('privateworkingset') && null !== $data->getPrivateworkingset()) {
            $dataArray['privateworkingset'] = $data->getPrivateworkingset();
        }
        foreach ($data->additionalPropertyEntries() as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerMemoryStats::class => false];
    }
}
