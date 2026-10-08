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

class ImageManifestSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ImageManifestSummary::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ImageManifestSummary::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ImageManifestSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Available', $data) && \is_int($data['Available'])) {
            $data['Available'] = (bool) $data['Available'];
        }
        if (\array_key_exists('ID', $data) && null !== $data['ID']) {
            $object->setID($data['ID']);
            unset($data['ID']);
        } elseif (\array_key_exists('ID', $data) && null === $data['ID']) {
            $object->setID(null);
            unset($data['ID']);
        }
        if (\array_key_exists('Descriptor', $data) && null !== $data['Descriptor']) {
            $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], \Docker\API\Model\OCIDescriptor::class, 'json', $context));
            unset($data['Descriptor']);
        } elseif (\array_key_exists('Descriptor', $data) && null === $data['Descriptor']) {
            $object->setDescriptor(null);
            unset($data['Descriptor']);
        }
        if (\array_key_exists('Available', $data) && null !== $data['Available']) {
            $object->setAvailable($data['Available']);
            unset($data['Available']);
        } elseif (\array_key_exists('Available', $data) && null === $data['Available']) {
            $object->setAvailable(null);
            unset($data['Available']);
        }
        if (\array_key_exists('Size', $data) && null !== $data['Size']) {
            $object->setSize($this->denormalizer->denormalize($data['Size'], \Docker\API\Model\ImageManifestSummarySize::class, 'json', $context));
            unset($data['Size']);
        } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
            $object->setSize(null);
            unset($data['Size']);
        }
        if (\array_key_exists('Kind', $data) && null !== $data['Kind']) {
            $object->setKind($data['Kind']);
            unset($data['Kind']);
        } elseif (\array_key_exists('Kind', $data) && null === $data['Kind']) {
            $object->setKind(null);
            unset($data['Kind']);
        }
        if (\array_key_exists('ImageData', $data) && null !== $data['ImageData']) {
            $object->setImageData($this->denormalizer->denormalize($data['ImageData'], \Docker\API\Model\ImageManifestSummaryImageData::class, 'json', $context));
            unset($data['ImageData']);
        } elseif (\array_key_exists('ImageData', $data) && null === $data['ImageData']) {
            $object->setImageData(null);
            unset($data['ImageData']);
        }
        if (\array_key_exists('AttestationData', $data) && null !== $data['AttestationData']) {
            $object->setAttestationData($this->denormalizer->denormalize($data['AttestationData'], \Docker\API\Model\ImageManifestSummaryAttestationData::class, 'json', $context));
            unset($data['AttestationData']);
        } elseif (\array_key_exists('AttestationData', $data) && null === $data['AttestationData']) {
            $object->setAttestationData(null);
            unset($data['AttestationData']);
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
        $dataArray['ID'] = $data->getID();
        $dataArray['Descriptor'] = null === $data->getDescriptor() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getDescriptor(), 'json', $context));
        $dataArray['Available'] = $data->getAvailable();
        $dataArray['Size'] = null === $data->getSize() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getSize(), 'json', $context));
        $dataArray['Kind'] = $data->getKind();
        if ($data->isInitialized('imageData') && null !== $data->getImageData()) {
            $dataArray['ImageData'] = null === $data->getImageData() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getImageData(), 'json', $context));
        }
        if ($data->isInitialized('attestationData') && null !== $data->getAttestationData()) {
            $dataArray['AttestationData'] = null === $data->getAttestationData() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getAttestationData(), 'json', $context));
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
        return [\Docker\API\Model\ImageManifestSummary::class => false];
    }
}
