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

class PluginConfigInterfaceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\PluginConfigInterface::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\PluginConfigInterface::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\PluginConfigInterface();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Types', $data) && null !== $data['Types']) {
            $values = [];
            foreach ($data['Types'] as $value) {
                $values[] = $value;
            }
            $object->setTypes($values);
            unset($data['Types']);
        } elseif (\array_key_exists('Types', $data) && null === $data['Types']) {
            $object->setTypes(null);
            unset($data['Types']);
        }
        if (\array_key_exists('Socket', $data) && null !== $data['Socket']) {
            $object->setSocket($data['Socket']);
            unset($data['Socket']);
        } elseif (\array_key_exists('Socket', $data) && null === $data['Socket']) {
            $object->setSocket(null);
            unset($data['Socket']);
        }
        if (\array_key_exists('ProtocolScheme', $data) && null !== $data['ProtocolScheme']) {
            $object->setProtocolScheme($data['ProtocolScheme']);
            unset($data['ProtocolScheme']);
        } elseif (\array_key_exists('ProtocolScheme', $data) && null === $data['ProtocolScheme']) {
            $object->setProtocolScheme(null);
            unset($data['ProtocolScheme']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $values = [];
        foreach ($data->getTypes() as $value) {
            $values[] = $value;
        }
        $dataArray['Types'] = $values;
        $dataArray['Socket'] = $data->getSocket();
        if ($data->isInitialized('protocolScheme') && null !== $data->getProtocolScheme()) {
            $dataArray['ProtocolScheme'] = $data->getProtocolScheme();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\PluginConfigInterface::class => false];
    }
}
