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

class ServiceInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ServiceInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ServiceInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ServiceInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('VIP', $data) && null !== $data['VIP']) {
            $object->setVIP($data['VIP']);
            unset($data['VIP']);
        } elseif (\array_key_exists('VIP', $data) && null === $data['VIP']) {
            $object->setVIP(null);
            unset($data['VIP']);
        }
        if (\array_key_exists('Ports', $data) && null !== $data['Ports']) {
            $values = [];
            foreach ($data['Ports'] as $value) {
                $values[] = $value;
            }
            $object->setPorts($values);
            unset($data['Ports']);
        } elseif (\array_key_exists('Ports', $data) && null === $data['Ports']) {
            $object->setPorts(null);
            unset($data['Ports']);
        }
        if (\array_key_exists('LocalLBIndex', $data) && null !== $data['LocalLBIndex']) {
            $object->setLocalLBIndex($data['LocalLBIndex']);
            unset($data['LocalLBIndex']);
        } elseif (\array_key_exists('LocalLBIndex', $data) && null === $data['LocalLBIndex']) {
            $object->setLocalLBIndex(null);
            unset($data['LocalLBIndex']);
        }
        if (\array_key_exists('Tasks', $data) && null !== $data['Tasks']) {
            $values_1 = [];
            foreach ($data['Tasks'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\NetworkTaskInfo::class, 'json', $context);
            }
            $object->setTasks($values_1);
            unset($data['Tasks']);
        } elseif (\array_key_exists('Tasks', $data) && null === $data['Tasks']) {
            $object->setTasks(null);
            unset($data['Tasks']);
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
        if ($data->isInitialized('vIP') && null !== $data->getVIP()) {
            $dataArray['VIP'] = $data->getVIP();
        }
        if ($data->isInitialized('ports') && null !== $data->getPorts()) {
            $values = [];
            foreach ($data->getPorts() as $value) {
                $values[] = $value;
            }
            $dataArray['Ports'] = $values;
        }
        if ($data->isInitialized('localLBIndex') && null !== $data->getLocalLBIndex()) {
            $dataArray['LocalLBIndex'] = $data->getLocalLBIndex();
        }
        if ($data->isInitialized('tasks') && null !== $data->getTasks()) {
            $values_1 = [];
            foreach ($data->getTasks() as $value_1) {
                $values_1[] = null === $value_1 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['Tasks'] = $values_1;
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
        return [\Docker\API\Model\ServiceInfo::class => false];
    }
}
