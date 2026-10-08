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

class PortSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\PortSummary::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\PortSummary::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\PortSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('IP', $data) && null !== $data['IP']) {
            $object->setIP($data['IP']);
            unset($data['IP']);
        } elseif (\array_key_exists('IP', $data) && null === $data['IP']) {
            $object->setIP(null);
            unset($data['IP']);
        }
        if (\array_key_exists('PrivatePort', $data) && null !== $data['PrivatePort']) {
            $object->setPrivatePort($data['PrivatePort']);
            unset($data['PrivatePort']);
        } elseif (\array_key_exists('PrivatePort', $data) && null === $data['PrivatePort']) {
            $object->setPrivatePort(null);
            unset($data['PrivatePort']);
        }
        if (\array_key_exists('PublicPort', $data) && null !== $data['PublicPort']) {
            $object->setPublicPort($data['PublicPort']);
            unset($data['PublicPort']);
        } elseif (\array_key_exists('PublicPort', $data) && null === $data['PublicPort']) {
            $object->setPublicPort(null);
            unset($data['PublicPort']);
        }
        if (\array_key_exists('Type', $data) && null !== $data['Type']) {
            $object->setType($data['Type']);
            unset($data['Type']);
        } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
            $object->setType(null);
            unset($data['Type']);
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
        if ($data->isInitialized('iP') && null !== $data->getIP()) {
            $dataArray['IP'] = $data->getIP();
        }
        $dataArray['PrivatePort'] = $data->getPrivatePort();
        if ($data->isInitialized('publicPort') && null !== $data->getPublicPort()) {
            $dataArray['PublicPort'] = $data->getPublicPort();
        }
        $dataArray['Type'] = $data->getType();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\PortSummary::class => false];
    }
}
