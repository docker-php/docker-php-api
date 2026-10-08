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

class SignerIdentityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SignerIdentity::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SignerIdentity::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\SignerIdentity();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('CertificateIssuer', $data) && null !== $data['CertificateIssuer']) {
            $object->setCertificateIssuer($data['CertificateIssuer']);
            unset($data['CertificateIssuer']);
        } elseif (\array_key_exists('CertificateIssuer', $data) && null === $data['CertificateIssuer']) {
            $object->setCertificateIssuer(null);
            unset($data['CertificateIssuer']);
        }
        if (\array_key_exists('SubjectAlternativeName', $data) && null !== $data['SubjectAlternativeName']) {
            $object->setSubjectAlternativeName($data['SubjectAlternativeName']);
            unset($data['SubjectAlternativeName']);
        } elseif (\array_key_exists('SubjectAlternativeName', $data) && null === $data['SubjectAlternativeName']) {
            $object->setSubjectAlternativeName(null);
            unset($data['SubjectAlternativeName']);
        }
        if (\array_key_exists('Issuer', $data) && null !== $data['Issuer']) {
            $object->setIssuer($data['Issuer']);
            unset($data['Issuer']);
        } elseif (\array_key_exists('Issuer', $data) && null === $data['Issuer']) {
            $object->setIssuer(null);
            unset($data['Issuer']);
        }
        if (\array_key_exists('BuildSignerURI', $data) && null !== $data['BuildSignerURI']) {
            $object->setBuildSignerURI($data['BuildSignerURI']);
            unset($data['BuildSignerURI']);
        } elseif (\array_key_exists('BuildSignerURI', $data) && null === $data['BuildSignerURI']) {
            $object->setBuildSignerURI(null);
            unset($data['BuildSignerURI']);
        }
        if (\array_key_exists('BuildSignerDigest', $data) && null !== $data['BuildSignerDigest']) {
            $object->setBuildSignerDigest($data['BuildSignerDigest']);
            unset($data['BuildSignerDigest']);
        } elseif (\array_key_exists('BuildSignerDigest', $data) && null === $data['BuildSignerDigest']) {
            $object->setBuildSignerDigest(null);
            unset($data['BuildSignerDigest']);
        }
        if (\array_key_exists('RunnerEnvironment', $data) && null !== $data['RunnerEnvironment']) {
            $object->setRunnerEnvironment($data['RunnerEnvironment']);
            unset($data['RunnerEnvironment']);
        } elseif (\array_key_exists('RunnerEnvironment', $data) && null === $data['RunnerEnvironment']) {
            $object->setRunnerEnvironment(null);
            unset($data['RunnerEnvironment']);
        }
        if (\array_key_exists('SourceRepositoryURI', $data) && null !== $data['SourceRepositoryURI']) {
            $object->setSourceRepositoryURI($data['SourceRepositoryURI']);
            unset($data['SourceRepositoryURI']);
        } elseif (\array_key_exists('SourceRepositoryURI', $data) && null === $data['SourceRepositoryURI']) {
            $object->setSourceRepositoryURI(null);
            unset($data['SourceRepositoryURI']);
        }
        if (\array_key_exists('SourceRepositoryDigest', $data) && null !== $data['SourceRepositoryDigest']) {
            $object->setSourceRepositoryDigest($data['SourceRepositoryDigest']);
            unset($data['SourceRepositoryDigest']);
        } elseif (\array_key_exists('SourceRepositoryDigest', $data) && null === $data['SourceRepositoryDigest']) {
            $object->setSourceRepositoryDigest(null);
            unset($data['SourceRepositoryDigest']);
        }
        if (\array_key_exists('SourceRepositoryRef', $data) && null !== $data['SourceRepositoryRef']) {
            $object->setSourceRepositoryRef($data['SourceRepositoryRef']);
            unset($data['SourceRepositoryRef']);
        } elseif (\array_key_exists('SourceRepositoryRef', $data) && null === $data['SourceRepositoryRef']) {
            $object->setSourceRepositoryRef(null);
            unset($data['SourceRepositoryRef']);
        }
        if (\array_key_exists('SourceRepositoryIdentifier', $data) && null !== $data['SourceRepositoryIdentifier']) {
            $object->setSourceRepositoryIdentifier($data['SourceRepositoryIdentifier']);
            unset($data['SourceRepositoryIdentifier']);
        } elseif (\array_key_exists('SourceRepositoryIdentifier', $data) && null === $data['SourceRepositoryIdentifier']) {
            $object->setSourceRepositoryIdentifier(null);
            unset($data['SourceRepositoryIdentifier']);
        }
        if (\array_key_exists('SourceRepositoryOwnerURI', $data) && null !== $data['SourceRepositoryOwnerURI']) {
            $object->setSourceRepositoryOwnerURI($data['SourceRepositoryOwnerURI']);
            unset($data['SourceRepositoryOwnerURI']);
        } elseif (\array_key_exists('SourceRepositoryOwnerURI', $data) && null === $data['SourceRepositoryOwnerURI']) {
            $object->setSourceRepositoryOwnerURI(null);
            unset($data['SourceRepositoryOwnerURI']);
        }
        if (\array_key_exists('SourceRepositoryOwnerIdentifier', $data) && null !== $data['SourceRepositoryOwnerIdentifier']) {
            $object->setSourceRepositoryOwnerIdentifier($data['SourceRepositoryOwnerIdentifier']);
            unset($data['SourceRepositoryOwnerIdentifier']);
        } elseif (\array_key_exists('SourceRepositoryOwnerIdentifier', $data) && null === $data['SourceRepositoryOwnerIdentifier']) {
            $object->setSourceRepositoryOwnerIdentifier(null);
            unset($data['SourceRepositoryOwnerIdentifier']);
        }
        if (\array_key_exists('BuildConfigURI', $data) && null !== $data['BuildConfigURI']) {
            $object->setBuildConfigURI($data['BuildConfigURI']);
            unset($data['BuildConfigURI']);
        } elseif (\array_key_exists('BuildConfigURI', $data) && null === $data['BuildConfigURI']) {
            $object->setBuildConfigURI(null);
            unset($data['BuildConfigURI']);
        }
        if (\array_key_exists('BuildConfigDigest', $data) && null !== $data['BuildConfigDigest']) {
            $object->setBuildConfigDigest($data['BuildConfigDigest']);
            unset($data['BuildConfigDigest']);
        } elseif (\array_key_exists('BuildConfigDigest', $data) && null === $data['BuildConfigDigest']) {
            $object->setBuildConfigDigest(null);
            unset($data['BuildConfigDigest']);
        }
        if (\array_key_exists('BuildTrigger', $data) && null !== $data['BuildTrigger']) {
            $object->setBuildTrigger($data['BuildTrigger']);
            unset($data['BuildTrigger']);
        } elseif (\array_key_exists('BuildTrigger', $data) && null === $data['BuildTrigger']) {
            $object->setBuildTrigger(null);
            unset($data['BuildTrigger']);
        }
        if (\array_key_exists('RunInvocationURI', $data) && null !== $data['RunInvocationURI']) {
            $object->setRunInvocationURI($data['RunInvocationURI']);
            unset($data['RunInvocationURI']);
        } elseif (\array_key_exists('RunInvocationURI', $data) && null === $data['RunInvocationURI']) {
            $object->setRunInvocationURI(null);
            unset($data['RunInvocationURI']);
        }
        if (\array_key_exists('SourceRepositoryVisibilityAtSigning', $data) && null !== $data['SourceRepositoryVisibilityAtSigning']) {
            $object->setSourceRepositoryVisibilityAtSigning($data['SourceRepositoryVisibilityAtSigning']);
            unset($data['SourceRepositoryVisibilityAtSigning']);
        } elseif (\array_key_exists('SourceRepositoryVisibilityAtSigning', $data) && null === $data['SourceRepositoryVisibilityAtSigning']) {
            $object->setSourceRepositoryVisibilityAtSigning(null);
            unset($data['SourceRepositoryVisibilityAtSigning']);
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
        if ($data->isInitialized('certificateIssuer') && null !== $data->getCertificateIssuer()) {
            $dataArray['CertificateIssuer'] = $data->getCertificateIssuer();
        }
        if ($data->isInitialized('subjectAlternativeName') && null !== $data->getSubjectAlternativeName()) {
            $dataArray['SubjectAlternativeName'] = $data->getSubjectAlternativeName();
        }
        if ($data->isInitialized('issuer') && null !== $data->getIssuer()) {
            $dataArray['Issuer'] = $data->getIssuer();
        }
        if ($data->isInitialized('buildSignerURI') && null !== $data->getBuildSignerURI()) {
            $dataArray['BuildSignerURI'] = $data->getBuildSignerURI();
        }
        if ($data->isInitialized('buildSignerDigest') && null !== $data->getBuildSignerDigest()) {
            $dataArray['BuildSignerDigest'] = $data->getBuildSignerDigest();
        }
        if ($data->isInitialized('runnerEnvironment') && null !== $data->getRunnerEnvironment()) {
            $dataArray['RunnerEnvironment'] = $data->getRunnerEnvironment();
        }
        if ($data->isInitialized('sourceRepositoryURI') && null !== $data->getSourceRepositoryURI()) {
            $dataArray['SourceRepositoryURI'] = $data->getSourceRepositoryURI();
        }
        if ($data->isInitialized('sourceRepositoryDigest') && null !== $data->getSourceRepositoryDigest()) {
            $dataArray['SourceRepositoryDigest'] = $data->getSourceRepositoryDigest();
        }
        if ($data->isInitialized('sourceRepositoryRef') && null !== $data->getSourceRepositoryRef()) {
            $dataArray['SourceRepositoryRef'] = $data->getSourceRepositoryRef();
        }
        if ($data->isInitialized('sourceRepositoryIdentifier') && null !== $data->getSourceRepositoryIdentifier()) {
            $dataArray['SourceRepositoryIdentifier'] = $data->getSourceRepositoryIdentifier();
        }
        if ($data->isInitialized('sourceRepositoryOwnerURI') && null !== $data->getSourceRepositoryOwnerURI()) {
            $dataArray['SourceRepositoryOwnerURI'] = $data->getSourceRepositoryOwnerURI();
        }
        if ($data->isInitialized('sourceRepositoryOwnerIdentifier') && null !== $data->getSourceRepositoryOwnerIdentifier()) {
            $dataArray['SourceRepositoryOwnerIdentifier'] = $data->getSourceRepositoryOwnerIdentifier();
        }
        if ($data->isInitialized('buildConfigURI') && null !== $data->getBuildConfigURI()) {
            $dataArray['BuildConfigURI'] = $data->getBuildConfigURI();
        }
        if ($data->isInitialized('buildConfigDigest') && null !== $data->getBuildConfigDigest()) {
            $dataArray['BuildConfigDigest'] = $data->getBuildConfigDigest();
        }
        if ($data->isInitialized('buildTrigger') && null !== $data->getBuildTrigger()) {
            $dataArray['BuildTrigger'] = $data->getBuildTrigger();
        }
        if ($data->isInitialized('runInvocationURI') && null !== $data->getRunInvocationURI()) {
            $dataArray['RunInvocationURI'] = $data->getRunInvocationURI();
        }
        if ($data->isInitialized('sourceRepositoryVisibilityAtSigning') && null !== $data->getSourceRepositoryVisibilityAtSigning()) {
            $dataArray['SourceRepositoryVisibilityAtSigning'] = $data->getSourceRepositoryVisibilityAtSigning();
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
        return [\Docker\API\Model\SignerIdentity::class => false];
    }
}
