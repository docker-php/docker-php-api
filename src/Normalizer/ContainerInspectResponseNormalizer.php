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

class ContainerInspectResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerInspectResponse::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerInspectResponse::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ContainerInspectResponse();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('Path', $data) && null !== $data['Path']) {
            $object->setPath($data['Path']);
            unset($data['Path']);
        } elseif (\array_key_exists('Path', $data) && null === $data['Path']) {
            $object->setPath(null);
            unset($data['Path']);
        }
        if (\array_key_exists('Args', $data) && null !== $data['Args']) {
            $values = [];
            foreach ($data['Args'] as $value) {
                $values[] = $value;
            }
            $object->setArgs($values);
            unset($data['Args']);
        } elseif (\array_key_exists('Args', $data) && null === $data['Args']) {
            $object->setArgs(null);
            unset($data['Args']);
        }
        if (\array_key_exists('State', $data) && null !== $data['State']) {
            $object->setState($this->denormalizer->denormalize($data['State'], \Docker\API\Model\ContainerState::class, 'json', $context));
            unset($data['State']);
        } elseif (\array_key_exists('State', $data) && null === $data['State']) {
            $object->setState(null);
            unset($data['State']);
        }
        if (\array_key_exists('Image', $data) && null !== $data['Image']) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        } elseif (\array_key_exists('Image', $data) && null === $data['Image']) {
            $object->setImage(null);
            unset($data['Image']);
        }
        if (\array_key_exists('ResolvConfPath', $data) && null !== $data['ResolvConfPath']) {
            $object->setResolvConfPath($data['ResolvConfPath']);
            unset($data['ResolvConfPath']);
        } elseif (\array_key_exists('ResolvConfPath', $data) && null === $data['ResolvConfPath']) {
            $object->setResolvConfPath(null);
            unset($data['ResolvConfPath']);
        }
        if (\array_key_exists('HostnamePath', $data) && null !== $data['HostnamePath']) {
            $object->setHostnamePath($data['HostnamePath']);
            unset($data['HostnamePath']);
        } elseif (\array_key_exists('HostnamePath', $data) && null === $data['HostnamePath']) {
            $object->setHostnamePath(null);
            unset($data['HostnamePath']);
        }
        if (\array_key_exists('HostsPath', $data) && null !== $data['HostsPath']) {
            $object->setHostsPath($data['HostsPath']);
            unset($data['HostsPath']);
        } elseif (\array_key_exists('HostsPath', $data) && null === $data['HostsPath']) {
            $object->setHostsPath(null);
            unset($data['HostsPath']);
        }
        if (\array_key_exists('LogPath', $data) && null !== $data['LogPath']) {
            $object->setLogPath($data['LogPath']);
            unset($data['LogPath']);
        } elseif (\array_key_exists('LogPath', $data) && null === $data['LogPath']) {
            $object->setLogPath(null);
            unset($data['LogPath']);
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
            unset($data['Name']);
        }
        if (\array_key_exists('RestartCount', $data) && null !== $data['RestartCount']) {
            $object->setRestartCount($data['RestartCount']);
            unset($data['RestartCount']);
        } elseif (\array_key_exists('RestartCount', $data) && null === $data['RestartCount']) {
            $object->setRestartCount(null);
            unset($data['RestartCount']);
        }
        if (\array_key_exists('Driver', $data) && null !== $data['Driver']) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && null === $data['Driver']) {
            $object->setDriver(null);
            unset($data['Driver']);
        }
        if (\array_key_exists('Platform', $data) && null !== $data['Platform']) {
            $object->setPlatform($data['Platform']);
            unset($data['Platform']);
        } elseif (\array_key_exists('Platform', $data) && null === $data['Platform']) {
            $object->setPlatform(null);
            unset($data['Platform']);
        }
        if (\array_key_exists('ImageManifestDescriptor', $data) && null !== $data['ImageManifestDescriptor']) {
            $object->setImageManifestDescriptor($this->denormalizer->denormalize($data['ImageManifestDescriptor'], \Docker\API\Model\OCIDescriptor::class, 'json', $context));
            unset($data['ImageManifestDescriptor']);
        } elseif (\array_key_exists('ImageManifestDescriptor', $data) && null === $data['ImageManifestDescriptor']) {
            $object->setImageManifestDescriptor(null);
            unset($data['ImageManifestDescriptor']);
        }
        if (\array_key_exists('MountLabel', $data) && null !== $data['MountLabel']) {
            $object->setMountLabel($data['MountLabel']);
            unset($data['MountLabel']);
        } elseif (\array_key_exists('MountLabel', $data) && null === $data['MountLabel']) {
            $object->setMountLabel(null);
            unset($data['MountLabel']);
        }
        if (\array_key_exists('ProcessLabel', $data) && null !== $data['ProcessLabel']) {
            $object->setProcessLabel($data['ProcessLabel']);
            unset($data['ProcessLabel']);
        } elseif (\array_key_exists('ProcessLabel', $data) && null === $data['ProcessLabel']) {
            $object->setProcessLabel(null);
            unset($data['ProcessLabel']);
        }
        if (\array_key_exists('AppArmorProfile', $data) && null !== $data['AppArmorProfile']) {
            $object->setAppArmorProfile($data['AppArmorProfile']);
            unset($data['AppArmorProfile']);
        } elseif (\array_key_exists('AppArmorProfile', $data) && null === $data['AppArmorProfile']) {
            $object->setAppArmorProfile(null);
            unset($data['AppArmorProfile']);
        }
        if (\array_key_exists('ExecIDs', $data) && null !== $data['ExecIDs']) {
            $values_1 = [];
            foreach ($data['ExecIDs'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExecIDs($values_1);
            unset($data['ExecIDs']);
        } elseif (\array_key_exists('ExecIDs', $data) && null === $data['ExecIDs']) {
            $object->setExecIDs(null);
            unset($data['ExecIDs']);
        }
        if (\array_key_exists('HostConfig', $data) && null !== $data['HostConfig']) {
            $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], \Docker\API\Model\HostConfig::class, 'json', $context));
            unset($data['HostConfig']);
        } elseif (\array_key_exists('HostConfig', $data) && null === $data['HostConfig']) {
            $object->setHostConfig(null);
            unset($data['HostConfig']);
        }
        if (\array_key_exists('GraphDriver', $data) && null !== $data['GraphDriver']) {
            $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], \Docker\API\Model\DriverData::class, 'json', $context));
            unset($data['GraphDriver']);
        } elseif (\array_key_exists('GraphDriver', $data) && null === $data['GraphDriver']) {
            $object->setGraphDriver(null);
            unset($data['GraphDriver']);
        }
        if (\array_key_exists('SizeRw', $data) && null !== $data['SizeRw']) {
            $object->setSizeRw($data['SizeRw']);
            unset($data['SizeRw']);
        } elseif (\array_key_exists('SizeRw', $data) && null === $data['SizeRw']) {
            $object->setSizeRw(null);
            unset($data['SizeRw']);
        }
        if (\array_key_exists('SizeRootFs', $data) && null !== $data['SizeRootFs']) {
            $object->setSizeRootFs($data['SizeRootFs']);
            unset($data['SizeRootFs']);
        } elseif (\array_key_exists('SizeRootFs', $data) && null === $data['SizeRootFs']) {
            $object->setSizeRootFs(null);
            unset($data['SizeRootFs']);
        }
        if (\array_key_exists('Mounts', $data) && null !== $data['Mounts']) {
            $values_2 = [];
            foreach ($data['Mounts'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\MountPoint::class, 'json', $context);
            }
            $object->setMounts($values_2);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && null === $data['Mounts']) {
            $object->setMounts(null);
            unset($data['Mounts']);
        }
        if (\array_key_exists('Config', $data) && null !== $data['Config']) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], \Docker\API\Model\ContainerConfig::class, 'json', $context));
            unset($data['Config']);
        } elseif (\array_key_exists('Config', $data) && null === $data['Config']) {
            $object->setConfig(null);
            unset($data['Config']);
        }
        if (\array_key_exists('NetworkSettings', $data) && null !== $data['NetworkSettings']) {
            $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], \Docker\API\Model\NetworkSettings::class, 'json', $context));
            unset($data['NetworkSettings']);
        } elseif (\array_key_exists('NetworkSettings', $data) && null === $data['NetworkSettings']) {
            $object->setNetworkSettings(null);
            unset($data['NetworkSettings']);
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
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['Id'] = $data->getId();
        }
        if ($data->isInitialized('created') && null !== $data->getCreated()) {
            $dataArray['Created'] = $data->getCreated();
        }
        if ($data->isInitialized('path') && null !== $data->getPath()) {
            $dataArray['Path'] = $data->getPath();
        }
        if ($data->isInitialized('args') && null !== $data->getArgs()) {
            $values = [];
            foreach ($data->getArgs() as $value) {
                $values[] = $value;
            }
            $dataArray['Args'] = $values;
        }
        if ($data->isInitialized('state') && null !== $data->getState()) {
            $dataArray['State'] = null === $data->getState() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getState(), 'json', $context));
        }
        if ($data->isInitialized('image') && null !== $data->getImage()) {
            $dataArray['Image'] = $data->getImage();
        }
        if ($data->isInitialized('resolvConfPath') && null !== $data->getResolvConfPath()) {
            $dataArray['ResolvConfPath'] = $data->getResolvConfPath();
        }
        if ($data->isInitialized('hostnamePath') && null !== $data->getHostnamePath()) {
            $dataArray['HostnamePath'] = $data->getHostnamePath();
        }
        if ($data->isInitialized('hostsPath') && null !== $data->getHostsPath()) {
            $dataArray['HostsPath'] = $data->getHostsPath();
        }
        if ($data->isInitialized('logPath') && null !== $data->getLogPath()) {
            $dataArray['LogPath'] = $data->getLogPath();
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('restartCount') && null !== $data->getRestartCount()) {
            $dataArray['RestartCount'] = $data->getRestartCount();
        }
        if ($data->isInitialized('driver') && null !== $data->getDriver()) {
            $dataArray['Driver'] = $data->getDriver();
        }
        if ($data->isInitialized('platform') && null !== $data->getPlatform()) {
            $dataArray['Platform'] = $data->getPlatform();
        }
        if ($data->isInitialized('imageManifestDescriptor') && null !== $data->getImageManifestDescriptor()) {
            $dataArray['ImageManifestDescriptor'] = null === $data->getImageManifestDescriptor() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getImageManifestDescriptor(), 'json', $context));
        }
        if ($data->isInitialized('mountLabel') && null !== $data->getMountLabel()) {
            $dataArray['MountLabel'] = $data->getMountLabel();
        }
        if ($data->isInitialized('processLabel') && null !== $data->getProcessLabel()) {
            $dataArray['ProcessLabel'] = $data->getProcessLabel();
        }
        if ($data->isInitialized('appArmorProfile') && null !== $data->getAppArmorProfile()) {
            $dataArray['AppArmorProfile'] = $data->getAppArmorProfile();
        }
        if ($data->isInitialized('execIDs') && null !== $data->getExecIDs()) {
            $values_1 = [];
            foreach ($data->getExecIDs() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['ExecIDs'] = $values_1;
        }
        if ($data->isInitialized('hostConfig') && null !== $data->getHostConfig()) {
            $dataArray['HostConfig'] = null === $data->getHostConfig() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getHostConfig(), 'json', $context));
        }
        if ($data->isInitialized('graphDriver') && null !== $data->getGraphDriver()) {
            $dataArray['GraphDriver'] = null === $data->getGraphDriver() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getGraphDriver(), 'json', $context));
        }
        if ($data->isInitialized('sizeRw') && null !== $data->getSizeRw()) {
            $dataArray['SizeRw'] = $data->getSizeRw();
        }
        if ($data->isInitialized('sizeRootFs') && null !== $data->getSizeRootFs()) {
            $dataArray['SizeRootFs'] = $data->getSizeRootFs();
        }
        if ($data->isInitialized('mounts') && null !== $data->getMounts()) {
            $values_2 = [];
            foreach ($data->getMounts() as $value_2) {
                $values_2[] = null === $value_2 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_2, 'json', $context));
            }
            $dataArray['Mounts'] = $values_2;
        }
        if ($data->isInitialized('config') && null !== $data->getConfig()) {
            $dataArray['Config'] = null === $data->getConfig() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getConfig(), 'json', $context));
        }
        if ($data->isInitialized('networkSettings') && null !== $data->getNetworkSettings()) {
            $dataArray['NetworkSettings'] = null === $data->getNetworkSettings() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getNetworkSettings(), 'json', $context));
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
        return [\Docker\API\Model\ContainerInspectResponse::class => false];
    }
}
