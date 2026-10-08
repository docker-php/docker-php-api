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

class PluginConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\PluginConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\PluginConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\PluginConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('IpcHost', $data) && \is_int($data['IpcHost'])) {
            $data['IpcHost'] = (bool) $data['IpcHost'];
        }
        if (\array_key_exists('PidHost', $data) && \is_int($data['PidHost'])) {
            $data['PidHost'] = (bool) $data['PidHost'];
        }
        if (\array_key_exists('Description', $data) && null !== $data['Description']) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        } elseif (\array_key_exists('Description', $data) && null === $data['Description']) {
            $object->setDescription(null);
            unset($data['Description']);
        }
        if (\array_key_exists('Documentation', $data) && null !== $data['Documentation']) {
            $object->setDocumentation($data['Documentation']);
            unset($data['Documentation']);
        } elseif (\array_key_exists('Documentation', $data) && null === $data['Documentation']) {
            $object->setDocumentation(null);
            unset($data['Documentation']);
        }
        if (\array_key_exists('Interface', $data) && null !== $data['Interface']) {
            $object->setInterface($this->denormalizer->denormalize($data['Interface'], \Docker\API\Model\PluginConfigInterface::class, 'json', $context));
            unset($data['Interface']);
        } elseif (\array_key_exists('Interface', $data) && null === $data['Interface']) {
            $object->setInterface(null);
            unset($data['Interface']);
        }
        if (\array_key_exists('Entrypoint', $data) && null !== $data['Entrypoint']) {
            $values = [];
            foreach ($data['Entrypoint'] as $value) {
                $values[] = $value;
            }
            $object->setEntrypoint($values);
            unset($data['Entrypoint']);
        } elseif (\array_key_exists('Entrypoint', $data) && null === $data['Entrypoint']) {
            $object->setEntrypoint(null);
            unset($data['Entrypoint']);
        }
        if (\array_key_exists('WorkDir', $data) && null !== $data['WorkDir']) {
            $object->setWorkDir($data['WorkDir']);
            unset($data['WorkDir']);
        } elseif (\array_key_exists('WorkDir', $data) && null === $data['WorkDir']) {
            $object->setWorkDir(null);
            unset($data['WorkDir']);
        }
        if (\array_key_exists('User', $data) && null !== $data['User']) {
            $object->setUser($this->denormalizer->denormalize($data['User'], \Docker\API\Model\PluginConfigUser::class, 'json', $context));
            unset($data['User']);
        } elseif (\array_key_exists('User', $data) && null === $data['User']) {
            $object->setUser(null);
            unset($data['User']);
        }
        if (\array_key_exists('Network', $data) && null !== $data['Network']) {
            $object->setNetwork($this->denormalizer->denormalize($data['Network'], \Docker\API\Model\PluginConfigNetwork::class, 'json', $context));
            unset($data['Network']);
        } elseif (\array_key_exists('Network', $data) && null === $data['Network']) {
            $object->setNetwork(null);
            unset($data['Network']);
        }
        if (\array_key_exists('Linux', $data) && null !== $data['Linux']) {
            $object->setLinux($this->denormalizer->denormalize($data['Linux'], \Docker\API\Model\PluginConfigLinux::class, 'json', $context));
            unset($data['Linux']);
        } elseif (\array_key_exists('Linux', $data) && null === $data['Linux']) {
            $object->setLinux(null);
            unset($data['Linux']);
        }
        if (\array_key_exists('PropagatedMount', $data) && null !== $data['PropagatedMount']) {
            $object->setPropagatedMount($data['PropagatedMount']);
            unset($data['PropagatedMount']);
        } elseif (\array_key_exists('PropagatedMount', $data) && null === $data['PropagatedMount']) {
            $object->setPropagatedMount(null);
            unset($data['PropagatedMount']);
        }
        if (\array_key_exists('IpcHost', $data) && null !== $data['IpcHost']) {
            $object->setIpcHost($data['IpcHost']);
            unset($data['IpcHost']);
        } elseif (\array_key_exists('IpcHost', $data) && null === $data['IpcHost']) {
            $object->setIpcHost(null);
            unset($data['IpcHost']);
        }
        if (\array_key_exists('PidHost', $data) && null !== $data['PidHost']) {
            $object->setPidHost($data['PidHost']);
            unset($data['PidHost']);
        } elseif (\array_key_exists('PidHost', $data) && null === $data['PidHost']) {
            $object->setPidHost(null);
            unset($data['PidHost']);
        }
        if (\array_key_exists('Mounts', $data) && null !== $data['Mounts']) {
            $values_1 = [];
            foreach ($data['Mounts'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\PluginMount::class, 'json', $context);
            }
            $object->setMounts($values_1);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && null === $data['Mounts']) {
            $object->setMounts(null);
            unset($data['Mounts']);
        }
        if (\array_key_exists('Env', $data) && null !== $data['Env']) {
            $values_2 = [];
            foreach ($data['Env'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\PluginEnv::class, 'json', $context);
            }
            $object->setEnv($values_2);
            unset($data['Env']);
        } elseif (\array_key_exists('Env', $data) && null === $data['Env']) {
            $object->setEnv(null);
            unset($data['Env']);
        }
        if (\array_key_exists('Args', $data) && null !== $data['Args']) {
            $object->setArgs($this->denormalizer->denormalize($data['Args'], \Docker\API\Model\PluginConfigArgs::class, 'json', $context));
            unset($data['Args']);
        } elseif (\array_key_exists('Args', $data) && null === $data['Args']) {
            $object->setArgs(null);
            unset($data['Args']);
        }
        if (\array_key_exists('rootfs', $data) && null !== $data['rootfs']) {
            $object->setRootfs($this->denormalizer->denormalize($data['rootfs'], \Docker\API\Model\PluginConfigRootfs::class, 'json', $context));
            unset($data['rootfs']);
        } elseif (\array_key_exists('rootfs', $data) && null === $data['rootfs']) {
            $object->setRootfs(null);
            unset($data['rootfs']);
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_3;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['Description'] = $data->getDescription();
        $dataArray['Documentation'] = $data->getDocumentation();
        $dataArray['Interface'] = null === $data->getInterface() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getInterface(), 'json', $context));
        $values = [];
        foreach ($data->getEntrypoint() as $value) {
            $values[] = $value;
        }
        $dataArray['Entrypoint'] = $values;
        $dataArray['WorkDir'] = $data->getWorkDir();
        if ($data->isInitialized('user') && null !== $data->getUser()) {
            $dataArray['User'] = null === $data->getUser() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getUser(), 'json', $context));
        }
        $dataArray['Network'] = null === $data->getNetwork() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getNetwork(), 'json', $context));
        $dataArray['Linux'] = null === $data->getLinux() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getLinux(), 'json', $context));
        $dataArray['PropagatedMount'] = $data->getPropagatedMount();
        $dataArray['IpcHost'] = $data->getIpcHost();
        $dataArray['PidHost'] = $data->getPidHost();
        $values_1 = [];
        foreach ($data->getMounts() as $value_1) {
            $values_1[] = null === $value_1 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_1, 'json', $context));
        }
        $dataArray['Mounts'] = $values_1;
        $values_2 = [];
        foreach ($data->getEnv() as $value_2) {
            $values_2[] = null === $value_2 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_2, 'json', $context));
        }
        $dataArray['Env'] = $values_2;
        $dataArray['Args'] = null === $data->getArgs() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getArgs(), 'json', $context));
        if ($data->isInitialized('rootfs') && null !== $data->getRootfs()) {
            $dataArray['rootfs'] = null === $data->getRootfs() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getRootfs(), 'json', $context));
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_3;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\PluginConfig::class => false];
    }
}
