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

class NetworkInspectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\NetworkInspect::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\NetworkInspect::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\NetworkInspect();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('EnableIPv4', $data) && \is_int($data['EnableIPv4'])) {
            $data['EnableIPv4'] = (bool) $data['EnableIPv4'];
        }
        if (\array_key_exists('EnableIPv6', $data) && \is_int($data['EnableIPv6'])) {
            $data['EnableIPv6'] = (bool) $data['EnableIPv6'];
        }
        if (\array_key_exists('Internal', $data) && \is_int($data['Internal'])) {
            $data['Internal'] = (bool) $data['Internal'];
        }
        if (\array_key_exists('Attachable', $data) && \is_int($data['Attachable'])) {
            $data['Attachable'] = (bool) $data['Attachable'];
        }
        if (\array_key_exists('Ingress', $data) && \is_int($data['Ingress'])) {
            $data['Ingress'] = (bool) $data['Ingress'];
        }
        if (\array_key_exists('ConfigOnly', $data) && \is_int($data['ConfigOnly'])) {
            $data['ConfigOnly'] = (bool) $data['ConfigOnly'];
        }
        if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Containers'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, \Docker\API\Model\EndpointResource::class, 'json', $context);
            }
            $object->setContainers($values);
            unset($data['Containers']);
        } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
            $object->setContainers(null);
            unset($data['Containers']);
        }
        if (\array_key_exists('Services', $data) && null !== $data['Services']) {
            $values_1 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Services'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setServices($values_1);
            unset($data['Services']);
        } elseif (\array_key_exists('Services', $data) && null === $data['Services']) {
            $object->setServices(null);
            unset($data['Services']);
        }
        if (\array_key_exists('Status', $data) && null !== $data['Status']) {
            $object->setStatus($this->denormalizer->denormalize($data['Status'], \Docker\API\Model\NetworkStatus::class, 'json', $context));
            unset($data['Status']);
        } elseif (\array_key_exists('Status', $data) && null === $data['Status']) {
            $object->setStatus(null);
            unset($data['Status']);
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
            unset($data['Name']);
        }
        if (\array_key_exists('Id', $data) && null !== $data['Id']) {
            $object->setId($data['Id']);
            unset($data['Id']);
        } elseif (\array_key_exists('Id', $data) && null === $data['Id']) {
            $object->setId(null);
            unset($data['Id']);
        }
        if (\array_key_exists('Created', $data) && null !== $data['Created']) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        } elseif (\array_key_exists('Created', $data) && null === $data['Created']) {
            $object->setCreated(null);
            unset($data['Created']);
        }
        if (\array_key_exists('Scope', $data) && null !== $data['Scope']) {
            $object->setScope($data['Scope']);
            unset($data['Scope']);
        } elseif (\array_key_exists('Scope', $data) && null === $data['Scope']) {
            $object->setScope(null);
            unset($data['Scope']);
        }
        if (\array_key_exists('Driver', $data) && null !== $data['Driver']) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && null === $data['Driver']) {
            $object->setDriver(null);
            unset($data['Driver']);
        }
        if (\array_key_exists('EnableIPv4', $data) && null !== $data['EnableIPv4']) {
            $object->setEnableIPv4($data['EnableIPv4']);
            unset($data['EnableIPv4']);
        } elseif (\array_key_exists('EnableIPv4', $data) && null === $data['EnableIPv4']) {
            $object->setEnableIPv4(null);
            unset($data['EnableIPv4']);
        }
        if (\array_key_exists('EnableIPv6', $data) && null !== $data['EnableIPv6']) {
            $object->setEnableIPv6($data['EnableIPv6']);
            unset($data['EnableIPv6']);
        } elseif (\array_key_exists('EnableIPv6', $data) && null === $data['EnableIPv6']) {
            $object->setEnableIPv6(null);
            unset($data['EnableIPv6']);
        }
        if (\array_key_exists('IPAM', $data) && null !== $data['IPAM']) {
            $object->setIPAM($this->denormalizer->denormalize($data['IPAM'], \Docker\API\Model\IPAM::class, 'json', $context));
            unset($data['IPAM']);
        } elseif (\array_key_exists('IPAM', $data) && null === $data['IPAM']) {
            $object->setIPAM(null);
            unset($data['IPAM']);
        }
        if (\array_key_exists('Internal', $data) && null !== $data['Internal']) {
            $object->setInternal($data['Internal']);
            unset($data['Internal']);
        } elseif (\array_key_exists('Internal', $data) && null === $data['Internal']) {
            $object->setInternal(null);
            unset($data['Internal']);
        }
        if (\array_key_exists('Attachable', $data) && null !== $data['Attachable']) {
            $object->setAttachable($data['Attachable']);
            unset($data['Attachable']);
        } elseif (\array_key_exists('Attachable', $data) && null === $data['Attachable']) {
            $object->setAttachable(null);
            unset($data['Attachable']);
        }
        if (\array_key_exists('Ingress', $data) && null !== $data['Ingress']) {
            $object->setIngress($data['Ingress']);
            unset($data['Ingress']);
        } elseif (\array_key_exists('Ingress', $data) && null === $data['Ingress']) {
            $object->setIngress(null);
            unset($data['Ingress']);
        }
        if (\array_key_exists('ConfigFrom', $data) && null !== $data['ConfigFrom']) {
            $object->setConfigFrom($this->denormalizer->denormalize($data['ConfigFrom'], \Docker\API\Model\ConfigReference::class, 'json', $context));
            unset($data['ConfigFrom']);
        } elseif (\array_key_exists('ConfigFrom', $data) && null === $data['ConfigFrom']) {
            $object->setConfigFrom(null);
            unset($data['ConfigFrom']);
        }
        if (\array_key_exists('ConfigOnly', $data) && null !== $data['ConfigOnly']) {
            $object->setConfigOnly($data['ConfigOnly']);
            unset($data['ConfigOnly']);
        } elseif (\array_key_exists('ConfigOnly', $data) && null === $data['ConfigOnly']) {
            $object->setConfigOnly(null);
            unset($data['ConfigOnly']);
        }
        if (\array_key_exists('Options', $data) && null !== $data['Options']) {
            $values_2 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Options'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setOptions($values_2);
            unset($data['Options']);
        } elseif (\array_key_exists('Options', $data) && null === $data['Options']) {
            $object->setOptions(null);
            unset($data['Options']);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values_3 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Labels'] as $key_3 => $value_3) {
                $values_3[$key_3] = $value_3;
            }
            $object->setLabels($values_3);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
            unset($data['Labels']);
        }
        if (\array_key_exists('Peers', $data) && null !== $data['Peers']) {
            $values_4 = [];
            foreach ($data['Peers'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, \Docker\API\Model\PeerInfo::class, 'json', $context);
            }
            $object->setPeers($values_4);
            unset($data['Peers']);
        } elseif (\array_key_exists('Peers', $data) && null === $data['Peers']) {
            $object->setPeers(null);
            unset($data['Peers']);
        }
        foreach ($data as $key_4 => $value_5) {
            if (preg_match('/.*/', (string) $key_4)) {
                $object[$key_4] = $value_5;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('containers') && null !== $data->getContainers()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getContainers() as $key => $value) {
                $values[$key] = null === $value ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['Containers'] = $values;
        }
        if ($data->isInitialized('services') && null !== $data->getServices()) {
            $values_1 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getServices() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $dataArray['Services'] = $values_1;
        }
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $dataArray['Status'] = null === $data->getStatus() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getStatus(), 'json', $context));
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['Id'] = $data->getId();
        }
        if ($data->isInitialized('created') && null !== $data->getCreated()) {
            $dataArray['Created'] = $data->getCreated();
        }
        if ($data->isInitialized('scope') && null !== $data->getScope()) {
            $dataArray['Scope'] = $data->getScope();
        }
        if ($data->isInitialized('driver') && null !== $data->getDriver()) {
            $dataArray['Driver'] = $data->getDriver();
        }
        if ($data->isInitialized('enableIPv4') && null !== $data->getEnableIPv4()) {
            $dataArray['EnableIPv4'] = $data->getEnableIPv4();
        }
        if ($data->isInitialized('enableIPv6') && null !== $data->getEnableIPv6()) {
            $dataArray['EnableIPv6'] = $data->getEnableIPv6();
        }
        if ($data->isInitialized('iPAM') && null !== $data->getIPAM()) {
            $dataArray['IPAM'] = null === $data->getIPAM() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getIPAM(), 'json', $context));
        }
        if ($data->isInitialized('internal') && null !== $data->getInternal()) {
            $dataArray['Internal'] = $data->getInternal();
        }
        if ($data->isInitialized('attachable') && null !== $data->getAttachable()) {
            $dataArray['Attachable'] = $data->getAttachable();
        }
        if ($data->isInitialized('ingress') && null !== $data->getIngress()) {
            $dataArray['Ingress'] = $data->getIngress();
        }
        if ($data->isInitialized('configFrom') && null !== $data->getConfigFrom()) {
            $dataArray['ConfigFrom'] = null === $data->getConfigFrom() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getConfigFrom(), 'json', $context));
        }
        if ($data->isInitialized('configOnly') && null !== $data->getConfigOnly()) {
            $dataArray['ConfigOnly'] = $data->getConfigOnly();
        }
        if ($data->isInitialized('options') && null !== $data->getOptions()) {
            $values_2 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getOptions() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $dataArray['Options'] = $values_2;
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values_3 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getLabels() as $key_3 => $value_3) {
                $values_3[$key_3] = $value_3;
            }
            $dataArray['Labels'] = $values_3;
        }
        if ($data->isInitialized('peers') && null !== $data->getPeers()) {
            $values_4 = [];
            foreach ($data->getPeers() as $value_4) {
                $values_4[] = null === $value_4 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_4, 'json', $context));
            }
            $dataArray['Peers'] = $values_4;
        }
        foreach ($data->additionalPropertyEntries() as $key_4 => $value_5) {
            if (preg_match('/.*/', (string) $key_4)) {
                $dataArray[$key_4] = $value_5;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\NetworkInspect::class => false];
    }
}
