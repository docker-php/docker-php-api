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

class SignatureIdentityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SignatureIdentity::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SignatureIdentity::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\SignatureIdentity();
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
        if (\array_key_exists('Timestamps', $data) && null !== $data['Timestamps']) {
            $values = [];
            foreach ($data['Timestamps'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\SignatureTimestamp::class, 'json', $context);
            }
            $object->setTimestamps($values);
            unset($data['Timestamps']);
        } elseif (\array_key_exists('Timestamps', $data) && null === $data['Timestamps']) {
            $object->setTimestamps(null);
            unset($data['Timestamps']);
        }
        if (\array_key_exists('KnownSigner', $data) && null !== $data['KnownSigner']) {
            $object->setKnownSigner($data['KnownSigner']);
            unset($data['KnownSigner']);
        } elseif (\array_key_exists('KnownSigner', $data) && null === $data['KnownSigner']) {
            $object->setKnownSigner(null);
            unset($data['KnownSigner']);
        }
        if (\array_key_exists('DockerReference', $data) && null !== $data['DockerReference']) {
            $object->setDockerReference($data['DockerReference']);
            unset($data['DockerReference']);
        } elseif (\array_key_exists('DockerReference', $data) && null === $data['DockerReference']) {
            $object->setDockerReference(null);
            unset($data['DockerReference']);
        }
        if (\array_key_exists('Signer', $data) && null !== $data['Signer']) {
            $object->setSigner($this->denormalizer->denormalize($data['Signer'], \Docker\API\Model\SignerIdentity::class, 'json', $context));
            unset($data['Signer']);
        } elseif (\array_key_exists('Signer', $data) && null === $data['Signer']) {
            $object->setSigner(null);
            unset($data['Signer']);
        }
        if (\array_key_exists('SignatureType', $data) && null !== $data['SignatureType']) {
            $object->setSignatureType($data['SignatureType']);
            unset($data['SignatureType']);
        } elseif (\array_key_exists('SignatureType', $data) && null === $data['SignatureType']) {
            $object->setSignatureType(null);
            unset($data['SignatureType']);
        }
        if (\array_key_exists('Error', $data) && null !== $data['Error']) {
            $object->setError($data['Error']);
            unset($data['Error']);
        } elseif (\array_key_exists('Error', $data) && null === $data['Error']) {
            $object->setError(null);
            unset($data['Error']);
        }
        if (\array_key_exists('Warnings', $data) && null !== $data['Warnings']) {
            $values_1 = [];
            foreach ($data['Warnings'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setWarnings($values_1);
            unset($data['Warnings']);
        } elseif (\array_key_exists('Warnings', $data) && null === $data['Warnings']) {
            $object->setWarnings(null);
            unset($data['Warnings']);
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
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('timestamps') && null !== $data->getTimestamps()) {
            $values = [];
            foreach ($data->getTimestamps() as $value) {
                $values[] = null === $value ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['Timestamps'] = $values;
        }
        if ($data->isInitialized('knownSigner') && null !== $data->getKnownSigner()) {
            $dataArray['KnownSigner'] = $data->getKnownSigner();
        }
        if ($data->isInitialized('dockerReference') && null !== $data->getDockerReference()) {
            $dataArray['DockerReference'] = $data->getDockerReference();
        }
        if ($data->isInitialized('signer') && null !== $data->getSigner()) {
            $dataArray['Signer'] = null === $data->getSigner() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getSigner(), 'json', $context));
        }
        if ($data->isInitialized('signatureType') && null !== $data->getSignatureType()) {
            $dataArray['SignatureType'] = $data->getSignatureType();
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['Error'] = $data->getError();
        }
        if ($data->isInitialized('warnings') && null !== $data->getWarnings()) {
            $values_1 = [];
            foreach ($data->getWarnings() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['Warnings'] = $values_1;
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
        return [\Docker\API\Model\SignatureIdentity::class => false];
    }
}
