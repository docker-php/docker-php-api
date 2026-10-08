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

class EndpointSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\EndpointSettings::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\EndpointSettings::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\EndpointSettings();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('IPAMConfig', $data) && null !== $data['IPAMConfig']) {
            $object->setIPAMConfig($this->denormalizer->denormalize($data['IPAMConfig'], \Docker\API\Model\EndpointIPAMConfig::class, 'json', $context));
            unset($data['IPAMConfig']);
        } elseif (\array_key_exists('IPAMConfig', $data) && null === $data['IPAMConfig']) {
            $object->setIPAMConfig(null);
            unset($data['IPAMConfig']);
        }
        if (\array_key_exists('Links', $data) && null !== $data['Links']) {
            $values = [];
            foreach ($data['Links'] as $value) {
                $values[] = $value;
            }
            $object->setLinks($values);
            unset($data['Links']);
        } elseif (\array_key_exists('Links', $data) && null === $data['Links']) {
            $object->setLinks(null);
            unset($data['Links']);
        }
        if (\array_key_exists('MacAddress', $data) && null !== $data['MacAddress']) {
            $object->setMacAddress($data['MacAddress']);
            unset($data['MacAddress']);
        } elseif (\array_key_exists('MacAddress', $data) && null === $data['MacAddress']) {
            $object->setMacAddress(null);
            unset($data['MacAddress']);
        }
        if (\array_key_exists('Aliases', $data) && null !== $data['Aliases']) {
            $values_1 = [];
            foreach ($data['Aliases'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAliases($values_1);
            unset($data['Aliases']);
        } elseif (\array_key_exists('Aliases', $data) && null === $data['Aliases']) {
            $object->setAliases(null);
            unset($data['Aliases']);
        }
        if (\array_key_exists('DriverOpts', $data) && null !== $data['DriverOpts']) {
            $values_2 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['DriverOpts'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setDriverOpts($values_2);
            unset($data['DriverOpts']);
        } elseif (\array_key_exists('DriverOpts', $data) && null === $data['DriverOpts']) {
            $object->setDriverOpts(null);
            unset($data['DriverOpts']);
        }
        if (\array_key_exists('GwPriority', $data) && null !== $data['GwPriority']) {
            $object->setGwPriority($data['GwPriority']);
            unset($data['GwPriority']);
        } elseif (\array_key_exists('GwPriority', $data) && null === $data['GwPriority']) {
            $object->setGwPriority(null);
            unset($data['GwPriority']);
        }
        if (\array_key_exists('NetworkID', $data) && null !== $data['NetworkID']) {
            $object->setNetworkID($data['NetworkID']);
            unset($data['NetworkID']);
        } elseif (\array_key_exists('NetworkID', $data) && null === $data['NetworkID']) {
            $object->setNetworkID(null);
            unset($data['NetworkID']);
        }
        if (\array_key_exists('EndpointID', $data) && null !== $data['EndpointID']) {
            $object->setEndpointID($data['EndpointID']);
            unset($data['EndpointID']);
        } elseif (\array_key_exists('EndpointID', $data) && null === $data['EndpointID']) {
            $object->setEndpointID(null);
            unset($data['EndpointID']);
        }
        if (\array_key_exists('Gateway', $data) && null !== $data['Gateway']) {
            $object->setGateway($data['Gateway']);
            unset($data['Gateway']);
        } elseif (\array_key_exists('Gateway', $data) && null === $data['Gateway']) {
            $object->setGateway(null);
            unset($data['Gateway']);
        }
        if (\array_key_exists('IPAddress', $data) && null !== $data['IPAddress']) {
            $object->setIPAddress($data['IPAddress']);
            unset($data['IPAddress']);
        } elseif (\array_key_exists('IPAddress', $data) && null === $data['IPAddress']) {
            $object->setIPAddress(null);
            unset($data['IPAddress']);
        }
        if (\array_key_exists('IPPrefixLen', $data) && null !== $data['IPPrefixLen']) {
            $object->setIPPrefixLen($data['IPPrefixLen']);
            unset($data['IPPrefixLen']);
        } elseif (\array_key_exists('IPPrefixLen', $data) && null === $data['IPPrefixLen']) {
            $object->setIPPrefixLen(null);
            unset($data['IPPrefixLen']);
        }
        if (\array_key_exists('IPv6Gateway', $data) && null !== $data['IPv6Gateway']) {
            $object->setIPv6Gateway($data['IPv6Gateway']);
            unset($data['IPv6Gateway']);
        } elseif (\array_key_exists('IPv6Gateway', $data) && null === $data['IPv6Gateway']) {
            $object->setIPv6Gateway(null);
            unset($data['IPv6Gateway']);
        }
        if (\array_key_exists('GlobalIPv6Address', $data) && null !== $data['GlobalIPv6Address']) {
            $object->setGlobalIPv6Address($data['GlobalIPv6Address']);
            unset($data['GlobalIPv6Address']);
        } elseif (\array_key_exists('GlobalIPv6Address', $data) && null === $data['GlobalIPv6Address']) {
            $object->setGlobalIPv6Address(null);
            unset($data['GlobalIPv6Address']);
        }
        if (\array_key_exists('GlobalIPv6PrefixLen', $data) && null !== $data['GlobalIPv6PrefixLen']) {
            $object->setGlobalIPv6PrefixLen($data['GlobalIPv6PrefixLen']);
            unset($data['GlobalIPv6PrefixLen']);
        } elseif (\array_key_exists('GlobalIPv6PrefixLen', $data) && null === $data['GlobalIPv6PrefixLen']) {
            $object->setGlobalIPv6PrefixLen(null);
            unset($data['GlobalIPv6PrefixLen']);
        }
        if (\array_key_exists('DNSNames', $data) && null !== $data['DNSNames']) {
            $values_3 = [];
            foreach ($data['DNSNames'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setDNSNames($values_3);
            unset($data['DNSNames']);
        } elseif (\array_key_exists('DNSNames', $data) && null === $data['DNSNames']) {
            $object->setDNSNames(null);
            unset($data['DNSNames']);
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
        if ($data->isInitialized('iPAMConfig') && null !== $data->getIPAMConfig()) {
            $dataArray['IPAMConfig'] = null === $data->getIPAMConfig() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getIPAMConfig(), 'json', $context));
        }
        if ($data->isInitialized('links') && null !== $data->getLinks()) {
            $values = [];
            foreach ($data->getLinks() as $value) {
                $values[] = $value;
            }
            $dataArray['Links'] = $values;
        }
        if ($data->isInitialized('macAddress') && null !== $data->getMacAddress()) {
            $dataArray['MacAddress'] = $data->getMacAddress();
        }
        if ($data->isInitialized('aliases') && null !== $data->getAliases()) {
            $values_1 = [];
            foreach ($data->getAliases() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['Aliases'] = $values_1;
        }
        if ($data->isInitialized('driverOpts') && null !== $data->getDriverOpts()) {
            $values_2 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getDriverOpts() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $dataArray['DriverOpts'] = $values_2;
        }
        if ($data->isInitialized('gwPriority') && null !== $data->getGwPriority()) {
            $dataArray['GwPriority'] = $data->getGwPriority();
        }
        if ($data->isInitialized('networkID') && null !== $data->getNetworkID()) {
            $dataArray['NetworkID'] = $data->getNetworkID();
        }
        if ($data->isInitialized('endpointID') && null !== $data->getEndpointID()) {
            $dataArray['EndpointID'] = $data->getEndpointID();
        }
        if ($data->isInitialized('gateway') && null !== $data->getGateway()) {
            $dataArray['Gateway'] = $data->getGateway();
        }
        if ($data->isInitialized('iPAddress') && null !== $data->getIPAddress()) {
            $dataArray['IPAddress'] = $data->getIPAddress();
        }
        if ($data->isInitialized('iPPrefixLen') && null !== $data->getIPPrefixLen()) {
            $dataArray['IPPrefixLen'] = $data->getIPPrefixLen();
        }
        if ($data->isInitialized('iPv6Gateway') && null !== $data->getIPv6Gateway()) {
            $dataArray['IPv6Gateway'] = $data->getIPv6Gateway();
        }
        if ($data->isInitialized('globalIPv6Address') && null !== $data->getGlobalIPv6Address()) {
            $dataArray['GlobalIPv6Address'] = $data->getGlobalIPv6Address();
        }
        if ($data->isInitialized('globalIPv6PrefixLen') && null !== $data->getGlobalIPv6PrefixLen()) {
            $dataArray['GlobalIPv6PrefixLen'] = $data->getGlobalIPv6PrefixLen();
        }
        if ($data->isInitialized('dNSNames') && null !== $data->getDNSNames()) {
            $values_3 = [];
            foreach ($data->getDNSNames() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['DNSNames'] = $values_3;
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
        return [\Docker\API\Model\EndpointSettings::class => false];
    }
}
