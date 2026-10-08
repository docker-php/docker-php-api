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

class EndpointResourceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\EndpointResource::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\EndpointResource::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\EndpointResource();
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
        if (\array_key_exists('MacAddress', $data) && null !== $data['MacAddress']) {
            $object->setMacAddress($data['MacAddress']);
            unset($data['MacAddress']);
        } elseif (\array_key_exists('MacAddress', $data) && null === $data['MacAddress']) {
            $object->setMacAddress(null);
            unset($data['MacAddress']);
        }
        if (\array_key_exists('IPv4Address', $data) && null !== $data['IPv4Address']) {
            $object->setIPv4Address($data['IPv4Address']);
            unset($data['IPv4Address']);
        } elseif (\array_key_exists('IPv4Address', $data) && null === $data['IPv4Address']) {
            $object->setIPv4Address(null);
            unset($data['IPv4Address']);
        }
        if (\array_key_exists('IPv6Address', $data) && null !== $data['IPv6Address']) {
            $object->setIPv6Address($data['IPv6Address']);
            unset($data['IPv6Address']);
        } elseif (\array_key_exists('IPv6Address', $data) && null === $data['IPv6Address']) {
            $object->setIPv6Address(null);
            unset($data['IPv6Address']);
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
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('endpointID') && null !== $data->getEndpointID()) {
            $dataArray['EndpointID'] = $data->getEndpointID();
        }
        if ($data->isInitialized('macAddress') && null !== $data->getMacAddress()) {
            $dataArray['MacAddress'] = $data->getMacAddress();
        }
        if ($data->isInitialized('iPv4Address') && null !== $data->getIPv4Address()) {
            $dataArray['IPv4Address'] = $data->getIPv4Address();
        }
        if ($data->isInitialized('iPv6Address') && null !== $data->getIPv6Address()) {
            $dataArray['IPv6Address'] = $data->getIPv6Address();
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
        return [\Docker\API\Model\EndpointResource::class => false];
    }
}
