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

class NetworkTaskInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\NetworkTaskInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\NetworkTaskInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\NetworkTaskInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
            unset($data['Name']);
        }
        if (\array_key_exists('EndpointID', $data) && null !== $data['EndpointID']) {
            $object->setEndpointID($data['EndpointID']);
            unset($data['EndpointID']);
        } elseif (\array_key_exists('EndpointID', $data) && null === $data['EndpointID']) {
            $object->setEndpointID(null);
            unset($data['EndpointID']);
        }
        if (\array_key_exists('EndpointIP', $data) && null !== $data['EndpointIP']) {
            $object->setEndpointIP($data['EndpointIP']);
            unset($data['EndpointIP']);
        } elseif (\array_key_exists('EndpointIP', $data) && null === $data['EndpointIP']) {
            $object->setEndpointIP(null);
            unset($data['EndpointIP']);
        }
        if (\array_key_exists('Info', $data) && null !== $data['Info']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Info'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setInfo($values);
            unset($data['Info']);
        } elseif (\array_key_exists('Info', $data) && null === $data['Info']) {
            $object->setInfo(null);
            unset($data['Info']);
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
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('endpointID') && null !== $data->getEndpointID()) {
            $dataArray['EndpointID'] = $data->getEndpointID();
        }
        if ($data->isInitialized('endpointIP') && null !== $data->getEndpointIP()) {
            $dataArray['EndpointIP'] = $data->getEndpointIP();
        }
        if ($data->isInitialized('info') && null !== $data->getInfo()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getInfo() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['Info'] = $values;
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
        return [\Docker\API\Model\NetworkTaskInfo::class => false];
    }
}
