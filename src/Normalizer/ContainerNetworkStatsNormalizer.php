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

class ContainerNetworkStatsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerNetworkStats::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerNetworkStats::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerNetworkStats();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('rx_bytes', $data) && null !== $data['rx_bytes']) {
            $object->setRxBytes($data['rx_bytes']);
            unset($data['rx_bytes']);
        } elseif (\array_key_exists('rx_bytes', $data) && null === $data['rx_bytes']) {
            $object->setRxBytes(null);
            unset($data['rx_bytes']);
        }
        if (\array_key_exists('rx_packets', $data) && null !== $data['rx_packets']) {
            $object->setRxPackets($data['rx_packets']);
            unset($data['rx_packets']);
        } elseif (\array_key_exists('rx_packets', $data) && null === $data['rx_packets']) {
            $object->setRxPackets(null);
            unset($data['rx_packets']);
        }
        if (\array_key_exists('rx_errors', $data) && null !== $data['rx_errors']) {
            $object->setRxErrors($data['rx_errors']);
            unset($data['rx_errors']);
        } elseif (\array_key_exists('rx_errors', $data) && null === $data['rx_errors']) {
            $object->setRxErrors(null);
            unset($data['rx_errors']);
        }
        if (\array_key_exists('rx_dropped', $data) && null !== $data['rx_dropped']) {
            $object->setRxDropped($data['rx_dropped']);
            unset($data['rx_dropped']);
        } elseif (\array_key_exists('rx_dropped', $data) && null === $data['rx_dropped']) {
            $object->setRxDropped(null);
            unset($data['rx_dropped']);
        }
        if (\array_key_exists('tx_bytes', $data) && null !== $data['tx_bytes']) {
            $object->setTxBytes($data['tx_bytes']);
            unset($data['tx_bytes']);
        } elseif (\array_key_exists('tx_bytes', $data) && null === $data['tx_bytes']) {
            $object->setTxBytes(null);
            unset($data['tx_bytes']);
        }
        if (\array_key_exists('tx_packets', $data) && null !== $data['tx_packets']) {
            $object->setTxPackets($data['tx_packets']);
            unset($data['tx_packets']);
        } elseif (\array_key_exists('tx_packets', $data) && null === $data['tx_packets']) {
            $object->setTxPackets(null);
            unset($data['tx_packets']);
        }
        if (\array_key_exists('tx_errors', $data) && null !== $data['tx_errors']) {
            $object->setTxErrors($data['tx_errors']);
            unset($data['tx_errors']);
        } elseif (\array_key_exists('tx_errors', $data) && null === $data['tx_errors']) {
            $object->setTxErrors(null);
            unset($data['tx_errors']);
        }
        if (\array_key_exists('tx_dropped', $data) && null !== $data['tx_dropped']) {
            $object->setTxDropped($data['tx_dropped']);
            unset($data['tx_dropped']);
        } elseif (\array_key_exists('tx_dropped', $data) && null === $data['tx_dropped']) {
            $object->setTxDropped(null);
            unset($data['tx_dropped']);
        }
        if (\array_key_exists('endpoint_id', $data) && null !== $data['endpoint_id']) {
            $object->setEndpointId($data['endpoint_id']);
            unset($data['endpoint_id']);
        } elseif (\array_key_exists('endpoint_id', $data) && null === $data['endpoint_id']) {
            $object->setEndpointId(null);
            unset($data['endpoint_id']);
        }
        if (\array_key_exists('instance_id', $data) && null !== $data['instance_id']) {
            $object->setInstanceId($data['instance_id']);
            unset($data['instance_id']);
        } elseif (\array_key_exists('instance_id', $data) && null === $data['instance_id']) {
            $object->setInstanceId(null);
            unset($data['instance_id']);
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
        if ($data->isInitialized('rxBytes') && null !== $data->getRxBytes()) {
            $dataArray['rx_bytes'] = $data->getRxBytes();
        }
        if ($data->isInitialized('rxPackets') && null !== $data->getRxPackets()) {
            $dataArray['rx_packets'] = $data->getRxPackets();
        }
        if ($data->isInitialized('rxErrors') && null !== $data->getRxErrors()) {
            $dataArray['rx_errors'] = $data->getRxErrors();
        }
        if ($data->isInitialized('rxDropped') && null !== $data->getRxDropped()) {
            $dataArray['rx_dropped'] = $data->getRxDropped();
        }
        if ($data->isInitialized('txBytes') && null !== $data->getTxBytes()) {
            $dataArray['tx_bytes'] = $data->getTxBytes();
        }
        if ($data->isInitialized('txPackets') && null !== $data->getTxPackets()) {
            $dataArray['tx_packets'] = $data->getTxPackets();
        }
        if ($data->isInitialized('txErrors') && null !== $data->getTxErrors()) {
            $dataArray['tx_errors'] = $data->getTxErrors();
        }
        if ($data->isInitialized('txDropped') && null !== $data->getTxDropped()) {
            $dataArray['tx_dropped'] = $data->getTxDropped();
        }
        if ($data->isInitialized('endpointId') && null !== $data->getEndpointId()) {
            $dataArray['endpoint_id'] = $data->getEndpointId();
        }
        if ($data->isInitialized('instanceId') && null !== $data->getInstanceId()) {
            $dataArray['instance_id'] = $data->getInstanceId();
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
        return [\Docker\API\Model\ContainerNetworkStats::class => false];
    }
}
