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

class AttestationStatementNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\AttestationStatement::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\AttestationStatement::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\AttestationStatement();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Descriptor', $data) && null !== $data['Descriptor']) {
            $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], \Docker\API\Model\OCIDescriptor::class, 'json', $context));
            unset($data['Descriptor']);
        } elseif (\array_key_exists('Descriptor', $data) && null === $data['Descriptor']) {
            $object->setDescriptor(null);
            unset($data['Descriptor']);
        }
        if (\array_key_exists('PredicateType', $data) && null !== $data['PredicateType']) {
            $object->setPredicateType($data['PredicateType']);
            unset($data['PredicateType']);
        } elseif (\array_key_exists('PredicateType', $data) && null === $data['PredicateType']) {
            $object->setPredicateType(null);
            unset($data['PredicateType']);
        }
        if (\array_key_exists('Statement', $data) && null !== $data['Statement']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Statement'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setStatement($values);
            unset($data['Statement']);
        } elseif (\array_key_exists('Statement', $data) && null === $data['Statement']) {
            $object->setStatement(null);
            unset($data['Statement']);
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
        $dataArray['Descriptor'] = null === $data->getDescriptor() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getDescriptor(), 'json', $context));
        $dataArray['PredicateType'] = $data->getPredicateType();
        if ($data->isInitialized('statement') && null !== $data->getStatement()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getStatement() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['Statement'] = $values;
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
        return [\Docker\API\Model\AttestationStatement::class => false];
    }
}
