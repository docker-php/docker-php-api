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

class HostConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\HostConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\HostConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\HostConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('OomKillDisable', $data) && \is_int($data['OomKillDisable'])) {
            $data['OomKillDisable'] = (bool) $data['OomKillDisable'];
        }
        if (\array_key_exists('Init', $data) && \is_int($data['Init'])) {
            $data['Init'] = (bool) $data['Init'];
        }
        if (\array_key_exists('AutoRemove', $data) && \is_int($data['AutoRemove'])) {
            $data['AutoRemove'] = (bool) $data['AutoRemove'];
        }
        if (\array_key_exists('Privileged', $data) && \is_int($data['Privileged'])) {
            $data['Privileged'] = (bool) $data['Privileged'];
        }
        if (\array_key_exists('PublishAllPorts', $data) && \is_int($data['PublishAllPorts'])) {
            $data['PublishAllPorts'] = (bool) $data['PublishAllPorts'];
        }
        if (\array_key_exists('ReadonlyRootfs', $data) && \is_int($data['ReadonlyRootfs'])) {
            $data['ReadonlyRootfs'] = (bool) $data['ReadonlyRootfs'];
        }
        if (\array_key_exists('CpuShares', $data) && null !== $data['CpuShares']) {
            $object->setCpuShares($data['CpuShares']);
            unset($data['CpuShares']);
        } elseif (\array_key_exists('CpuShares', $data) && null === $data['CpuShares']) {
            $object->setCpuShares(null);
            unset($data['CpuShares']);
        }
        if (\array_key_exists('Memory', $data) && null !== $data['Memory']) {
            $object->setMemory($data['Memory']);
            unset($data['Memory']);
        } elseif (\array_key_exists('Memory', $data) && null === $data['Memory']) {
            $object->setMemory(null);
            unset($data['Memory']);
        }
        if (\array_key_exists('CgroupParent', $data) && null !== $data['CgroupParent']) {
            $object->setCgroupParent($data['CgroupParent']);
            unset($data['CgroupParent']);
        } elseif (\array_key_exists('CgroupParent', $data) && null === $data['CgroupParent']) {
            $object->setCgroupParent(null);
            unset($data['CgroupParent']);
        }
        if (\array_key_exists('BlkioWeight', $data) && null !== $data['BlkioWeight']) {
            $object->setBlkioWeight($data['BlkioWeight']);
            unset($data['BlkioWeight']);
        } elseif (\array_key_exists('BlkioWeight', $data) && null === $data['BlkioWeight']) {
            $object->setBlkioWeight(null);
            unset($data['BlkioWeight']);
        }
        if (\array_key_exists('BlkioWeightDevice', $data) && null !== $data['BlkioWeightDevice']) {
            $values = [];
            foreach ($data['BlkioWeightDevice'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\ResourcesBlkioWeightDeviceItem::class, 'json', $context);
            }
            $object->setBlkioWeightDevice($values);
            unset($data['BlkioWeightDevice']);
        } elseif (\array_key_exists('BlkioWeightDevice', $data) && null === $data['BlkioWeightDevice']) {
            $object->setBlkioWeightDevice(null);
            unset($data['BlkioWeightDevice']);
        }
        if (\array_key_exists('BlkioDeviceReadBps', $data) && null !== $data['BlkioDeviceReadBps']) {
            $values_1 = [];
            foreach ($data['BlkioDeviceReadBps'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\ThrottleDevice::class, 'json', $context);
            }
            $object->setBlkioDeviceReadBps($values_1);
            unset($data['BlkioDeviceReadBps']);
        } elseif (\array_key_exists('BlkioDeviceReadBps', $data) && null === $data['BlkioDeviceReadBps']) {
            $object->setBlkioDeviceReadBps(null);
            unset($data['BlkioDeviceReadBps']);
        }
        if (\array_key_exists('BlkioDeviceWriteBps', $data) && null !== $data['BlkioDeviceWriteBps']) {
            $values_2 = [];
            foreach ($data['BlkioDeviceWriteBps'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\ThrottleDevice::class, 'json', $context);
            }
            $object->setBlkioDeviceWriteBps($values_2);
            unset($data['BlkioDeviceWriteBps']);
        } elseif (\array_key_exists('BlkioDeviceWriteBps', $data) && null === $data['BlkioDeviceWriteBps']) {
            $object->setBlkioDeviceWriteBps(null);
            unset($data['BlkioDeviceWriteBps']);
        }
        if (\array_key_exists('BlkioDeviceReadIOps', $data) && null !== $data['BlkioDeviceReadIOps']) {
            $values_3 = [];
            foreach ($data['BlkioDeviceReadIOps'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\ThrottleDevice::class, 'json', $context);
            }
            $object->setBlkioDeviceReadIOps($values_3);
            unset($data['BlkioDeviceReadIOps']);
        } elseif (\array_key_exists('BlkioDeviceReadIOps', $data) && null === $data['BlkioDeviceReadIOps']) {
            $object->setBlkioDeviceReadIOps(null);
            unset($data['BlkioDeviceReadIOps']);
        }
        if (\array_key_exists('BlkioDeviceWriteIOps', $data) && null !== $data['BlkioDeviceWriteIOps']) {
            $values_4 = [];
            foreach ($data['BlkioDeviceWriteIOps'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, \Docker\API\Model\ThrottleDevice::class, 'json', $context);
            }
            $object->setBlkioDeviceWriteIOps($values_4);
            unset($data['BlkioDeviceWriteIOps']);
        } elseif (\array_key_exists('BlkioDeviceWriteIOps', $data) && null === $data['BlkioDeviceWriteIOps']) {
            $object->setBlkioDeviceWriteIOps(null);
            unset($data['BlkioDeviceWriteIOps']);
        }
        if (\array_key_exists('CpuPeriod', $data) && null !== $data['CpuPeriod']) {
            $object->setCpuPeriod($data['CpuPeriod']);
            unset($data['CpuPeriod']);
        } elseif (\array_key_exists('CpuPeriod', $data) && null === $data['CpuPeriod']) {
            $object->setCpuPeriod(null);
            unset($data['CpuPeriod']);
        }
        if (\array_key_exists('CpuQuota', $data) && null !== $data['CpuQuota']) {
            $object->setCpuQuota($data['CpuQuota']);
            unset($data['CpuQuota']);
        } elseif (\array_key_exists('CpuQuota', $data) && null === $data['CpuQuota']) {
            $object->setCpuQuota(null);
            unset($data['CpuQuota']);
        }
        if (\array_key_exists('CpuRealtimePeriod', $data) && null !== $data['CpuRealtimePeriod']) {
            $object->setCpuRealtimePeriod($data['CpuRealtimePeriod']);
            unset($data['CpuRealtimePeriod']);
        } elseif (\array_key_exists('CpuRealtimePeriod', $data) && null === $data['CpuRealtimePeriod']) {
            $object->setCpuRealtimePeriod(null);
            unset($data['CpuRealtimePeriod']);
        }
        if (\array_key_exists('CpuRealtimeRuntime', $data) && null !== $data['CpuRealtimeRuntime']) {
            $object->setCpuRealtimeRuntime($data['CpuRealtimeRuntime']);
            unset($data['CpuRealtimeRuntime']);
        } elseif (\array_key_exists('CpuRealtimeRuntime', $data) && null === $data['CpuRealtimeRuntime']) {
            $object->setCpuRealtimeRuntime(null);
            unset($data['CpuRealtimeRuntime']);
        }
        if (\array_key_exists('CpusetCpus', $data) && null !== $data['CpusetCpus']) {
            $object->setCpusetCpus($data['CpusetCpus']);
            unset($data['CpusetCpus']);
        } elseif (\array_key_exists('CpusetCpus', $data) && null === $data['CpusetCpus']) {
            $object->setCpusetCpus(null);
            unset($data['CpusetCpus']);
        }
        if (\array_key_exists('CpusetMems', $data) && null !== $data['CpusetMems']) {
            $object->setCpusetMems($data['CpusetMems']);
            unset($data['CpusetMems']);
        } elseif (\array_key_exists('CpusetMems', $data) && null === $data['CpusetMems']) {
            $object->setCpusetMems(null);
            unset($data['CpusetMems']);
        }
        if (\array_key_exists('Devices', $data) && null !== $data['Devices']) {
            $values_5 = [];
            foreach ($data['Devices'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, \Docker\API\Model\DeviceMapping::class, 'json', $context);
            }
            $object->setDevices($values_5);
            unset($data['Devices']);
        } elseif (\array_key_exists('Devices', $data) && null === $data['Devices']) {
            $object->setDevices(null);
            unset($data['Devices']);
        }
        if (\array_key_exists('DeviceCgroupRules', $data) && null !== $data['DeviceCgroupRules']) {
            $values_6 = [];
            foreach ($data['DeviceCgroupRules'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setDeviceCgroupRules($values_6);
            unset($data['DeviceCgroupRules']);
        } elseif (\array_key_exists('DeviceCgroupRules', $data) && null === $data['DeviceCgroupRules']) {
            $object->setDeviceCgroupRules(null);
            unset($data['DeviceCgroupRules']);
        }
        if (\array_key_exists('DeviceRequests', $data) && null !== $data['DeviceRequests']) {
            $values_7 = [];
            foreach ($data['DeviceRequests'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, \Docker\API\Model\DeviceRequest::class, 'json', $context);
            }
            $object->setDeviceRequests($values_7);
            unset($data['DeviceRequests']);
        } elseif (\array_key_exists('DeviceRequests', $data) && null === $data['DeviceRequests']) {
            $object->setDeviceRequests(null);
            unset($data['DeviceRequests']);
        }
        if (\array_key_exists('KernelMemoryTCP', $data) && null !== $data['KernelMemoryTCP']) {
            $object->setKernelMemoryTCP($data['KernelMemoryTCP']);
            unset($data['KernelMemoryTCP']);
        } elseif (\array_key_exists('KernelMemoryTCP', $data) && null === $data['KernelMemoryTCP']) {
            $object->setKernelMemoryTCP(null);
            unset($data['KernelMemoryTCP']);
        }
        if (\array_key_exists('MemoryReservation', $data) && null !== $data['MemoryReservation']) {
            $object->setMemoryReservation($data['MemoryReservation']);
            unset($data['MemoryReservation']);
        } elseif (\array_key_exists('MemoryReservation', $data) && null === $data['MemoryReservation']) {
            $object->setMemoryReservation(null);
            unset($data['MemoryReservation']);
        }
        if (\array_key_exists('MemorySwap', $data) && null !== $data['MemorySwap']) {
            $object->setMemorySwap($data['MemorySwap']);
            unset($data['MemorySwap']);
        } elseif (\array_key_exists('MemorySwap', $data) && null === $data['MemorySwap']) {
            $object->setMemorySwap(null);
            unset($data['MemorySwap']);
        }
        if (\array_key_exists('MemorySwappiness', $data) && null !== $data['MemorySwappiness']) {
            $object->setMemorySwappiness($data['MemorySwappiness']);
            unset($data['MemorySwappiness']);
        } elseif (\array_key_exists('MemorySwappiness', $data) && null === $data['MemorySwappiness']) {
            $object->setMemorySwappiness(null);
            unset($data['MemorySwappiness']);
        }
        if (\array_key_exists('NanoCpus', $data) && null !== $data['NanoCpus']) {
            $object->setNanoCpus($data['NanoCpus']);
            unset($data['NanoCpus']);
        } elseif (\array_key_exists('NanoCpus', $data) && null === $data['NanoCpus']) {
            $object->setNanoCpus(null);
            unset($data['NanoCpus']);
        }
        if (\array_key_exists('OomKillDisable', $data) && null !== $data['OomKillDisable']) {
            $object->setOomKillDisable($data['OomKillDisable']);
            unset($data['OomKillDisable']);
        } elseif (\array_key_exists('OomKillDisable', $data) && null === $data['OomKillDisable']) {
            $object->setOomKillDisable(null);
            unset($data['OomKillDisable']);
        }
        if (\array_key_exists('Init', $data) && null !== $data['Init']) {
            $object->setInit($data['Init']);
            unset($data['Init']);
        } elseif (\array_key_exists('Init', $data) && null === $data['Init']) {
            $object->setInit(null);
            unset($data['Init']);
        }
        if (\array_key_exists('PidsLimit', $data) && null !== $data['PidsLimit']) {
            $object->setPidsLimit($data['PidsLimit']);
            unset($data['PidsLimit']);
        } elseif (\array_key_exists('PidsLimit', $data) && null === $data['PidsLimit']) {
            $object->setPidsLimit(null);
            unset($data['PidsLimit']);
        }
        if (\array_key_exists('Ulimits', $data) && null !== $data['Ulimits']) {
            $values_8 = [];
            foreach ($data['Ulimits'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, \Docker\API\Model\ResourcesUlimitsItem::class, 'json', $context);
            }
            $object->setUlimits($values_8);
            unset($data['Ulimits']);
        } elseif (\array_key_exists('Ulimits', $data) && null === $data['Ulimits']) {
            $object->setUlimits(null);
            unset($data['Ulimits']);
        }
        if (\array_key_exists('CpuCount', $data) && null !== $data['CpuCount']) {
            $object->setCpuCount($data['CpuCount']);
            unset($data['CpuCount']);
        } elseif (\array_key_exists('CpuCount', $data) && null === $data['CpuCount']) {
            $object->setCpuCount(null);
            unset($data['CpuCount']);
        }
        if (\array_key_exists('CpuPercent', $data) && null !== $data['CpuPercent']) {
            $object->setCpuPercent($data['CpuPercent']);
            unset($data['CpuPercent']);
        } elseif (\array_key_exists('CpuPercent', $data) && null === $data['CpuPercent']) {
            $object->setCpuPercent(null);
            unset($data['CpuPercent']);
        }
        if (\array_key_exists('IOMaximumIOps', $data) && null !== $data['IOMaximumIOps']) {
            $object->setIOMaximumIOps($data['IOMaximumIOps']);
            unset($data['IOMaximumIOps']);
        } elseif (\array_key_exists('IOMaximumIOps', $data) && null === $data['IOMaximumIOps']) {
            $object->setIOMaximumIOps(null);
            unset($data['IOMaximumIOps']);
        }
        if (\array_key_exists('IOMaximumBandwidth', $data) && null !== $data['IOMaximumBandwidth']) {
            $object->setIOMaximumBandwidth($data['IOMaximumBandwidth']);
            unset($data['IOMaximumBandwidth']);
        } elseif (\array_key_exists('IOMaximumBandwidth', $data) && null === $data['IOMaximumBandwidth']) {
            $object->setIOMaximumBandwidth(null);
            unset($data['IOMaximumBandwidth']);
        }
        if (\array_key_exists('Binds', $data) && null !== $data['Binds']) {
            $values_9 = [];
            foreach ($data['Binds'] as $value_9) {
                $values_9[] = $value_9;
            }
            $object->setBinds($values_9);
            unset($data['Binds']);
        } elseif (\array_key_exists('Binds', $data) && null === $data['Binds']) {
            $object->setBinds(null);
            unset($data['Binds']);
        }
        if (\array_key_exists('ContainerIDFile', $data) && null !== $data['ContainerIDFile']) {
            $object->setContainerIDFile($data['ContainerIDFile']);
            unset($data['ContainerIDFile']);
        } elseif (\array_key_exists('ContainerIDFile', $data) && null === $data['ContainerIDFile']) {
            $object->setContainerIDFile(null);
            unset($data['ContainerIDFile']);
        }
        if (\array_key_exists('LogConfig', $data) && null !== $data['LogConfig']) {
            $object->setLogConfig($this->denormalizer->denormalize($data['LogConfig'], \Docker\API\Model\HostConfigLogConfig::class, 'json', $context));
            unset($data['LogConfig']);
        } elseif (\array_key_exists('LogConfig', $data) && null === $data['LogConfig']) {
            $object->setLogConfig(null);
            unset($data['LogConfig']);
        }
        if (\array_key_exists('NetworkMode', $data) && null !== $data['NetworkMode']) {
            $object->setNetworkMode($data['NetworkMode']);
            unset($data['NetworkMode']);
        } elseif (\array_key_exists('NetworkMode', $data) && null === $data['NetworkMode']) {
            $object->setNetworkMode(null);
            unset($data['NetworkMode']);
        }
        if (\array_key_exists('PortBindings', $data) && null !== $data['PortBindings']) {
            $values_10 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['PortBindings'] as $key => $value_10) {
                if (null === $value_10) {
                    $values_10[$key] = null;
                    continue;
                }
                $values_11 = [];
                foreach ($value_10 as $value_11) {
                    $values_11[] = $this->denormalizer->denormalize($value_11, \Docker\API\Model\PortBinding::class, 'json', $context);
                }
                $values_10[$key] = $values_11;
            }
            $object->setPortBindings($values_10);
            unset($data['PortBindings']);
        } elseif (\array_key_exists('PortBindings', $data) && null === $data['PortBindings']) {
            $object->setPortBindings(null);
            unset($data['PortBindings']);
        }
        if (\array_key_exists('RestartPolicy', $data) && null !== $data['RestartPolicy']) {
            $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], \Docker\API\Model\RestartPolicy::class, 'json', $context));
            unset($data['RestartPolicy']);
        } elseif (\array_key_exists('RestartPolicy', $data) && null === $data['RestartPolicy']) {
            $object->setRestartPolicy(null);
            unset($data['RestartPolicy']);
        }
        if (\array_key_exists('AutoRemove', $data) && null !== $data['AutoRemove']) {
            $object->setAutoRemove($data['AutoRemove']);
            unset($data['AutoRemove']);
        } elseif (\array_key_exists('AutoRemove', $data) && null === $data['AutoRemove']) {
            $object->setAutoRemove(null);
            unset($data['AutoRemove']);
        }
        if (\array_key_exists('VolumeDriver', $data) && null !== $data['VolumeDriver']) {
            $object->setVolumeDriver($data['VolumeDriver']);
            unset($data['VolumeDriver']);
        } elseif (\array_key_exists('VolumeDriver', $data) && null === $data['VolumeDriver']) {
            $object->setVolumeDriver(null);
            unset($data['VolumeDriver']);
        }
        if (\array_key_exists('VolumesFrom', $data) && null !== $data['VolumesFrom']) {
            $values_12 = [];
            foreach ($data['VolumesFrom'] as $value_12) {
                $values_12[] = $value_12;
            }
            $object->setVolumesFrom($values_12);
            unset($data['VolumesFrom']);
        } elseif (\array_key_exists('VolumesFrom', $data) && null === $data['VolumesFrom']) {
            $object->setVolumesFrom(null);
            unset($data['VolumesFrom']);
        }
        if (\array_key_exists('Mounts', $data) && null !== $data['Mounts']) {
            $values_13 = [];
            foreach ($data['Mounts'] as $value_13) {
                $values_13[] = $this->denormalizer->denormalize($value_13, \Docker\API\Model\Mount::class, 'json', $context);
            }
            $object->setMounts($values_13);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && null === $data['Mounts']) {
            $object->setMounts(null);
            unset($data['Mounts']);
        }
        if (\array_key_exists('ConsoleSize', $data) && null !== $data['ConsoleSize']) {
            $values_14 = [];
            foreach ($data['ConsoleSize'] as $value_14) {
                $values_14[] = $value_14;
            }
            $object->setConsoleSize($values_14);
            unset($data['ConsoleSize']);
        } elseif (\array_key_exists('ConsoleSize', $data) && null === $data['ConsoleSize']) {
            $object->setConsoleSize(null);
            unset($data['ConsoleSize']);
        }
        if (\array_key_exists('Annotations', $data) && null !== $data['Annotations']) {
            $values_15 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Annotations'] as $key_1 => $value_15) {
                $values_15[$key_1] = $value_15;
            }
            $object->setAnnotations($values_15);
            unset($data['Annotations']);
        } elseif (\array_key_exists('Annotations', $data) && null === $data['Annotations']) {
            $object->setAnnotations(null);
            unset($data['Annotations']);
        }
        if (\array_key_exists('CapAdd', $data) && null !== $data['CapAdd']) {
            $values_16 = [];
            foreach ($data['CapAdd'] as $value_16) {
                $values_16[] = $value_16;
            }
            $object->setCapAdd($values_16);
            unset($data['CapAdd']);
        } elseif (\array_key_exists('CapAdd', $data) && null === $data['CapAdd']) {
            $object->setCapAdd(null);
            unset($data['CapAdd']);
        }
        if (\array_key_exists('CapDrop', $data) && null !== $data['CapDrop']) {
            $values_17 = [];
            foreach ($data['CapDrop'] as $value_17) {
                $values_17[] = $value_17;
            }
            $object->setCapDrop($values_17);
            unset($data['CapDrop']);
        } elseif (\array_key_exists('CapDrop', $data) && null === $data['CapDrop']) {
            $object->setCapDrop(null);
            unset($data['CapDrop']);
        }
        if (\array_key_exists('CgroupnsMode', $data) && null !== $data['CgroupnsMode']) {
            $object->setCgroupnsMode($data['CgroupnsMode']);
            unset($data['CgroupnsMode']);
        } elseif (\array_key_exists('CgroupnsMode', $data) && null === $data['CgroupnsMode']) {
            $object->setCgroupnsMode(null);
            unset($data['CgroupnsMode']);
        }
        if (\array_key_exists('Dns', $data) && null !== $data['Dns']) {
            $values_18 = [];
            foreach ($data['Dns'] as $value_18) {
                $values_18[] = $value_18;
            }
            $object->setDns($values_18);
            unset($data['Dns']);
        } elseif (\array_key_exists('Dns', $data) && null === $data['Dns']) {
            $object->setDns(null);
            unset($data['Dns']);
        }
        if (\array_key_exists('DnsOptions', $data) && null !== $data['DnsOptions']) {
            $values_19 = [];
            foreach ($data['DnsOptions'] as $value_19) {
                $values_19[] = $value_19;
            }
            $object->setDnsOptions($values_19);
            unset($data['DnsOptions']);
        } elseif (\array_key_exists('DnsOptions', $data) && null === $data['DnsOptions']) {
            $object->setDnsOptions(null);
            unset($data['DnsOptions']);
        }
        if (\array_key_exists('DnsSearch', $data) && null !== $data['DnsSearch']) {
            $values_20 = [];
            foreach ($data['DnsSearch'] as $value_20) {
                $values_20[] = $value_20;
            }
            $object->setDnsSearch($values_20);
            unset($data['DnsSearch']);
        } elseif (\array_key_exists('DnsSearch', $data) && null === $data['DnsSearch']) {
            $object->setDnsSearch(null);
            unset($data['DnsSearch']);
        }
        if (\array_key_exists('ExtraHosts', $data) && null !== $data['ExtraHosts']) {
            $values_21 = [];
            foreach ($data['ExtraHosts'] as $value_21) {
                $values_21[] = $value_21;
            }
            $object->setExtraHosts($values_21);
            unset($data['ExtraHosts']);
        } elseif (\array_key_exists('ExtraHosts', $data) && null === $data['ExtraHosts']) {
            $object->setExtraHosts(null);
            unset($data['ExtraHosts']);
        }
        if (\array_key_exists('GroupAdd', $data) && null !== $data['GroupAdd']) {
            $values_22 = [];
            foreach ($data['GroupAdd'] as $value_22) {
                $values_22[] = $value_22;
            }
            $object->setGroupAdd($values_22);
            unset($data['GroupAdd']);
        } elseif (\array_key_exists('GroupAdd', $data) && null === $data['GroupAdd']) {
            $object->setGroupAdd(null);
            unset($data['GroupAdd']);
        }
        if (\array_key_exists('IpcMode', $data) && null !== $data['IpcMode']) {
            $object->setIpcMode($data['IpcMode']);
            unset($data['IpcMode']);
        } elseif (\array_key_exists('IpcMode', $data) && null === $data['IpcMode']) {
            $object->setIpcMode(null);
            unset($data['IpcMode']);
        }
        if (\array_key_exists('Cgroup', $data) && null !== $data['Cgroup']) {
            $object->setCgroup($data['Cgroup']);
            unset($data['Cgroup']);
        } elseif (\array_key_exists('Cgroup', $data) && null === $data['Cgroup']) {
            $object->setCgroup(null);
            unset($data['Cgroup']);
        }
        if (\array_key_exists('Links', $data) && null !== $data['Links']) {
            $values_23 = [];
            foreach ($data['Links'] as $value_23) {
                $values_23[] = $value_23;
            }
            $object->setLinks($values_23);
            unset($data['Links']);
        } elseif (\array_key_exists('Links', $data) && null === $data['Links']) {
            $object->setLinks(null);
            unset($data['Links']);
        }
        if (\array_key_exists('OomScoreAdj', $data) && null !== $data['OomScoreAdj']) {
            $object->setOomScoreAdj($data['OomScoreAdj']);
            unset($data['OomScoreAdj']);
        } elseif (\array_key_exists('OomScoreAdj', $data) && null === $data['OomScoreAdj']) {
            $object->setOomScoreAdj(null);
            unset($data['OomScoreAdj']);
        }
        if (\array_key_exists('PidMode', $data) && null !== $data['PidMode']) {
            $object->setPidMode($data['PidMode']);
            unset($data['PidMode']);
        } elseif (\array_key_exists('PidMode', $data) && null === $data['PidMode']) {
            $object->setPidMode(null);
            unset($data['PidMode']);
        }
        if (\array_key_exists('Privileged', $data) && null !== $data['Privileged']) {
            $object->setPrivileged($data['Privileged']);
            unset($data['Privileged']);
        } elseif (\array_key_exists('Privileged', $data) && null === $data['Privileged']) {
            $object->setPrivileged(null);
            unset($data['Privileged']);
        }
        if (\array_key_exists('PublishAllPorts', $data) && null !== $data['PublishAllPorts']) {
            $object->setPublishAllPorts($data['PublishAllPorts']);
            unset($data['PublishAllPorts']);
        } elseif (\array_key_exists('PublishAllPorts', $data) && null === $data['PublishAllPorts']) {
            $object->setPublishAllPorts(null);
            unset($data['PublishAllPorts']);
        }
        if (\array_key_exists('ReadonlyRootfs', $data) && null !== $data['ReadonlyRootfs']) {
            $object->setReadonlyRootfs($data['ReadonlyRootfs']);
            unset($data['ReadonlyRootfs']);
        } elseif (\array_key_exists('ReadonlyRootfs', $data) && null === $data['ReadonlyRootfs']) {
            $object->setReadonlyRootfs(null);
            unset($data['ReadonlyRootfs']);
        }
        if (\array_key_exists('SecurityOpt', $data) && null !== $data['SecurityOpt']) {
            $values_24 = [];
            foreach ($data['SecurityOpt'] as $value_24) {
                $values_24[] = $value_24;
            }
            $object->setSecurityOpt($values_24);
            unset($data['SecurityOpt']);
        } elseif (\array_key_exists('SecurityOpt', $data) && null === $data['SecurityOpt']) {
            $object->setSecurityOpt(null);
            unset($data['SecurityOpt']);
        }
        if (\array_key_exists('StorageOpt', $data) && null !== $data['StorageOpt']) {
            $values_25 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['StorageOpt'] as $key_2 => $value_25) {
                $values_25[$key_2] = $value_25;
            }
            $object->setStorageOpt($values_25);
            unset($data['StorageOpt']);
        } elseif (\array_key_exists('StorageOpt', $data) && null === $data['StorageOpt']) {
            $object->setStorageOpt(null);
            unset($data['StorageOpt']);
        }
        if (\array_key_exists('Tmpfs', $data) && null !== $data['Tmpfs']) {
            $values_26 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Tmpfs'] as $key_3 => $value_26) {
                $values_26[$key_3] = $value_26;
            }
            $object->setTmpfs($values_26);
            unset($data['Tmpfs']);
        } elseif (\array_key_exists('Tmpfs', $data) && null === $data['Tmpfs']) {
            $object->setTmpfs(null);
            unset($data['Tmpfs']);
        }
        if (\array_key_exists('UTSMode', $data) && null !== $data['UTSMode']) {
            $object->setUTSMode($data['UTSMode']);
            unset($data['UTSMode']);
        } elseif (\array_key_exists('UTSMode', $data) && null === $data['UTSMode']) {
            $object->setUTSMode(null);
            unset($data['UTSMode']);
        }
        if (\array_key_exists('UsernsMode', $data) && null !== $data['UsernsMode']) {
            $object->setUsernsMode($data['UsernsMode']);
            unset($data['UsernsMode']);
        } elseif (\array_key_exists('UsernsMode', $data) && null === $data['UsernsMode']) {
            $object->setUsernsMode(null);
            unset($data['UsernsMode']);
        }
        if (\array_key_exists('ShmSize', $data) && null !== $data['ShmSize']) {
            $object->setShmSize($data['ShmSize']);
            unset($data['ShmSize']);
        } elseif (\array_key_exists('ShmSize', $data) && null === $data['ShmSize']) {
            $object->setShmSize(null);
            unset($data['ShmSize']);
        }
        if (\array_key_exists('Sysctls', $data) && null !== $data['Sysctls']) {
            $values_27 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Sysctls'] as $key_4 => $value_27) {
                $values_27[$key_4] = $value_27;
            }
            $object->setSysctls($values_27);
            unset($data['Sysctls']);
        } elseif (\array_key_exists('Sysctls', $data) && null === $data['Sysctls']) {
            $object->setSysctls(null);
            unset($data['Sysctls']);
        }
        if (\array_key_exists('Runtime', $data) && null !== $data['Runtime']) {
            $object->setRuntime($data['Runtime']);
            unset($data['Runtime']);
        } elseif (\array_key_exists('Runtime', $data) && null === $data['Runtime']) {
            $object->setRuntime(null);
            unset($data['Runtime']);
        }
        if (\array_key_exists('Isolation', $data) && null !== $data['Isolation']) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        } elseif (\array_key_exists('Isolation', $data) && null === $data['Isolation']) {
            $object->setIsolation(null);
            unset($data['Isolation']);
        }
        if (\array_key_exists('MaskedPaths', $data) && null !== $data['MaskedPaths']) {
            $values_28 = [];
            foreach ($data['MaskedPaths'] as $value_28) {
                $values_28[] = $value_28;
            }
            $object->setMaskedPaths($values_28);
            unset($data['MaskedPaths']);
        } elseif (\array_key_exists('MaskedPaths', $data) && null === $data['MaskedPaths']) {
            $object->setMaskedPaths(null);
            unset($data['MaskedPaths']);
        }
        if (\array_key_exists('ReadonlyPaths', $data) && null !== $data['ReadonlyPaths']) {
            $values_29 = [];
            foreach ($data['ReadonlyPaths'] as $value_29) {
                $values_29[] = $value_29;
            }
            $object->setReadonlyPaths($values_29);
            unset($data['ReadonlyPaths']);
        } elseif (\array_key_exists('ReadonlyPaths', $data) && null === $data['ReadonlyPaths']) {
            $object->setReadonlyPaths(null);
            unset($data['ReadonlyPaths']);
        }
        foreach ($data as $key_5 => $value_30) {
            if (preg_match('/.*/', (string) $key_5)) {
                $object[$key_5] = $value_30;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('cpuShares') && null !== $data->getCpuShares()) {
            $dataArray['CpuShares'] = $data->getCpuShares();
        }
        if ($data->isInitialized('memory') && null !== $data->getMemory()) {
            $dataArray['Memory'] = $data->getMemory();
        }
        if ($data->isInitialized('cgroupParent') && null !== $data->getCgroupParent()) {
            $dataArray['CgroupParent'] = $data->getCgroupParent();
        }
        if ($data->isInitialized('blkioWeight') && null !== $data->getBlkioWeight()) {
            $dataArray['BlkioWeight'] = $data->getBlkioWeight();
        }
        if ($data->isInitialized('blkioWeightDevice') && null !== $data->getBlkioWeightDevice()) {
            $values = [];
            foreach ($data->getBlkioWeightDevice() as $value) {
                $values[] = null === $value ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['BlkioWeightDevice'] = $values;
        }
        if ($data->isInitialized('blkioDeviceReadBps') && null !== $data->getBlkioDeviceReadBps()) {
            $values_1 = [];
            foreach ($data->getBlkioDeviceReadBps() as $value_1) {
                $values_1[] = null === $value_1 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['BlkioDeviceReadBps'] = $values_1;
        }
        if ($data->isInitialized('blkioDeviceWriteBps') && null !== $data->getBlkioDeviceWriteBps()) {
            $values_2 = [];
            foreach ($data->getBlkioDeviceWriteBps() as $value_2) {
                $values_2[] = null === $value_2 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_2, 'json', $context));
            }
            $dataArray['BlkioDeviceWriteBps'] = $values_2;
        }
        if ($data->isInitialized('blkioDeviceReadIOps') && null !== $data->getBlkioDeviceReadIOps()) {
            $values_3 = [];
            foreach ($data->getBlkioDeviceReadIOps() as $value_3) {
                $values_3[] = null === $value_3 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_3, 'json', $context));
            }
            $dataArray['BlkioDeviceReadIOps'] = $values_3;
        }
        if ($data->isInitialized('blkioDeviceWriteIOps') && null !== $data->getBlkioDeviceWriteIOps()) {
            $values_4 = [];
            foreach ($data->getBlkioDeviceWriteIOps() as $value_4) {
                $values_4[] = null === $value_4 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_4, 'json', $context));
            }
            $dataArray['BlkioDeviceWriteIOps'] = $values_4;
        }
        if ($data->isInitialized('cpuPeriod') && null !== $data->getCpuPeriod()) {
            $dataArray['CpuPeriod'] = $data->getCpuPeriod();
        }
        if ($data->isInitialized('cpuQuota') && null !== $data->getCpuQuota()) {
            $dataArray['CpuQuota'] = $data->getCpuQuota();
        }
        if ($data->isInitialized('cpuRealtimePeriod') && null !== $data->getCpuRealtimePeriod()) {
            $dataArray['CpuRealtimePeriod'] = $data->getCpuRealtimePeriod();
        }
        if ($data->isInitialized('cpuRealtimeRuntime') && null !== $data->getCpuRealtimeRuntime()) {
            $dataArray['CpuRealtimeRuntime'] = $data->getCpuRealtimeRuntime();
        }
        if ($data->isInitialized('cpusetCpus') && null !== $data->getCpusetCpus()) {
            $dataArray['CpusetCpus'] = $data->getCpusetCpus();
        }
        if ($data->isInitialized('cpusetMems') && null !== $data->getCpusetMems()) {
            $dataArray['CpusetMems'] = $data->getCpusetMems();
        }
        if ($data->isInitialized('devices') && null !== $data->getDevices()) {
            $values_5 = [];
            foreach ($data->getDevices() as $value_5) {
                $values_5[] = null === $value_5 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_5, 'json', $context));
            }
            $dataArray['Devices'] = $values_5;
        }
        if ($data->isInitialized('deviceCgroupRules') && null !== $data->getDeviceCgroupRules()) {
            $values_6 = [];
            foreach ($data->getDeviceCgroupRules() as $value_6) {
                $values_6[] = $value_6;
            }
            $dataArray['DeviceCgroupRules'] = $values_6;
        }
        if ($data->isInitialized('deviceRequests') && null !== $data->getDeviceRequests()) {
            $values_7 = [];
            foreach ($data->getDeviceRequests() as $value_7) {
                $values_7[] = null === $value_7 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_7, 'json', $context));
            }
            $dataArray['DeviceRequests'] = $values_7;
        }
        if ($data->isInitialized('kernelMemoryTCP') && null !== $data->getKernelMemoryTCP()) {
            $dataArray['KernelMemoryTCP'] = $data->getKernelMemoryTCP();
        }
        if ($data->isInitialized('memoryReservation') && null !== $data->getMemoryReservation()) {
            $dataArray['MemoryReservation'] = $data->getMemoryReservation();
        }
        if ($data->isInitialized('memorySwap') && null !== $data->getMemorySwap()) {
            $dataArray['MemorySwap'] = $data->getMemorySwap();
        }
        if ($data->isInitialized('memorySwappiness') && null !== $data->getMemorySwappiness()) {
            $dataArray['MemorySwappiness'] = $data->getMemorySwappiness();
        }
        if ($data->isInitialized('nanoCpus') && null !== $data->getNanoCpus()) {
            $dataArray['NanoCpus'] = $data->getNanoCpus();
        }
        if ($data->isInitialized('oomKillDisable') && null !== $data->getOomKillDisable()) {
            $dataArray['OomKillDisable'] = $data->getOomKillDisable();
        }
        if ($data->isInitialized('init') && null !== $data->getInit()) {
            $dataArray['Init'] = $data->getInit();
        }
        if ($data->isInitialized('pidsLimit') && null !== $data->getPidsLimit()) {
            $dataArray['PidsLimit'] = $data->getPidsLimit();
        }
        if ($data->isInitialized('ulimits') && null !== $data->getUlimits()) {
            $values_8 = [];
            foreach ($data->getUlimits() as $value_8) {
                $values_8[] = null === $value_8 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_8, 'json', $context));
            }
            $dataArray['Ulimits'] = $values_8;
        }
        if ($data->isInitialized('cpuCount') && null !== $data->getCpuCount()) {
            $dataArray['CpuCount'] = $data->getCpuCount();
        }
        if ($data->isInitialized('cpuPercent') && null !== $data->getCpuPercent()) {
            $dataArray['CpuPercent'] = $data->getCpuPercent();
        }
        if ($data->isInitialized('iOMaximumIOps') && null !== $data->getIOMaximumIOps()) {
            $dataArray['IOMaximumIOps'] = $data->getIOMaximumIOps();
        }
        if ($data->isInitialized('iOMaximumBandwidth') && null !== $data->getIOMaximumBandwidth()) {
            $dataArray['IOMaximumBandwidth'] = $data->getIOMaximumBandwidth();
        }
        if ($data->isInitialized('binds') && null !== $data->getBinds()) {
            $values_9 = [];
            foreach ($data->getBinds() as $value_9) {
                $values_9[] = $value_9;
            }
            $dataArray['Binds'] = $values_9;
        }
        if ($data->isInitialized('containerIDFile') && null !== $data->getContainerIDFile()) {
            $dataArray['ContainerIDFile'] = $data->getContainerIDFile();
        }
        if ($data->isInitialized('logConfig') && null !== $data->getLogConfig()) {
            $dataArray['LogConfig'] = null === $data->getLogConfig() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getLogConfig(), 'json', $context));
        }
        if ($data->isInitialized('networkMode') && null !== $data->getNetworkMode()) {
            $dataArray['NetworkMode'] = $data->getNetworkMode();
        }
        if ($data->isInitialized('portBindings') && null !== $data->getPortBindings()) {
            $values_10 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getPortBindings() as $key => $value_10) {
                if (null === $value_10) {
                    $values_10[$key] = null;
                    continue;
                }
                $values_11 = [];
                foreach ($value_10 as $value_11) {
                    $values_11[] = null === $value_11 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_11, 'json', $context));
                }
                $values_10[$key] = $values_11;
            }
            $dataArray['PortBindings'] = $values_10;
        }
        if ($data->isInitialized('restartPolicy') && null !== $data->getRestartPolicy()) {
            $dataArray['RestartPolicy'] = null === $data->getRestartPolicy() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getRestartPolicy(), 'json', $context));
        }
        if ($data->isInitialized('autoRemove') && null !== $data->getAutoRemove()) {
            $dataArray['AutoRemove'] = $data->getAutoRemove();
        }
        if ($data->isInitialized('volumeDriver') && null !== $data->getVolumeDriver()) {
            $dataArray['VolumeDriver'] = $data->getVolumeDriver();
        }
        if ($data->isInitialized('volumesFrom') && null !== $data->getVolumesFrom()) {
            $values_12 = [];
            foreach ($data->getVolumesFrom() as $value_12) {
                $values_12[] = $value_12;
            }
            $dataArray['VolumesFrom'] = $values_12;
        }
        if ($data->isInitialized('mounts') && null !== $data->getMounts()) {
            $values_13 = [];
            foreach ($data->getMounts() as $value_13) {
                $values_13[] = null === $value_13 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_13, 'json', $context));
            }
            $dataArray['Mounts'] = $values_13;
        }
        if ($data->isInitialized('consoleSize') && null !== $data->getConsoleSize()) {
            $values_14 = [];
            foreach ($data->getConsoleSize() as $value_14) {
                $values_14[] = $value_14;
            }
            $dataArray['ConsoleSize'] = $values_14;
        }
        if ($data->isInitialized('annotations') && null !== $data->getAnnotations()) {
            $values_15 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getAnnotations() as $key_1 => $value_15) {
                $values_15[$key_1] = $value_15;
            }
            $dataArray['Annotations'] = $values_15;
        }
        if ($data->isInitialized('capAdd') && null !== $data->getCapAdd()) {
            $values_16 = [];
            foreach ($data->getCapAdd() as $value_16) {
                $values_16[] = $value_16;
            }
            $dataArray['CapAdd'] = $values_16;
        }
        if ($data->isInitialized('capDrop') && null !== $data->getCapDrop()) {
            $values_17 = [];
            foreach ($data->getCapDrop() as $value_17) {
                $values_17[] = $value_17;
            }
            $dataArray['CapDrop'] = $values_17;
        }
        if ($data->isInitialized('cgroupnsMode') && null !== $data->getCgroupnsMode()) {
            $dataArray['CgroupnsMode'] = $data->getCgroupnsMode();
        }
        if ($data->isInitialized('dns') && null !== $data->getDns()) {
            $values_18 = [];
            foreach ($data->getDns() as $value_18) {
                $values_18[] = $value_18;
            }
            $dataArray['Dns'] = $values_18;
        }
        if ($data->isInitialized('dnsOptions') && null !== $data->getDnsOptions()) {
            $values_19 = [];
            foreach ($data->getDnsOptions() as $value_19) {
                $values_19[] = $value_19;
            }
            $dataArray['DnsOptions'] = $values_19;
        }
        if ($data->isInitialized('dnsSearch') && null !== $data->getDnsSearch()) {
            $values_20 = [];
            foreach ($data->getDnsSearch() as $value_20) {
                $values_20[] = $value_20;
            }
            $dataArray['DnsSearch'] = $values_20;
        }
        if ($data->isInitialized('extraHosts') && null !== $data->getExtraHosts()) {
            $values_21 = [];
            foreach ($data->getExtraHosts() as $value_21) {
                $values_21[] = $value_21;
            }
            $dataArray['ExtraHosts'] = $values_21;
        }
        if ($data->isInitialized('groupAdd') && null !== $data->getGroupAdd()) {
            $values_22 = [];
            foreach ($data->getGroupAdd() as $value_22) {
                $values_22[] = $value_22;
            }
            $dataArray['GroupAdd'] = $values_22;
        }
        if ($data->isInitialized('ipcMode') && null !== $data->getIpcMode()) {
            $dataArray['IpcMode'] = $data->getIpcMode();
        }
        if ($data->isInitialized('cgroup') && null !== $data->getCgroup()) {
            $dataArray['Cgroup'] = $data->getCgroup();
        }
        if ($data->isInitialized('links') && null !== $data->getLinks()) {
            $values_23 = [];
            foreach ($data->getLinks() as $value_23) {
                $values_23[] = $value_23;
            }
            $dataArray['Links'] = $values_23;
        }
        if ($data->isInitialized('oomScoreAdj') && null !== $data->getOomScoreAdj()) {
            $dataArray['OomScoreAdj'] = $data->getOomScoreAdj();
        }
        if ($data->isInitialized('pidMode') && null !== $data->getPidMode()) {
            $dataArray['PidMode'] = $data->getPidMode();
        }
        if ($data->isInitialized('privileged') && null !== $data->getPrivileged()) {
            $dataArray['Privileged'] = $data->getPrivileged();
        }
        if ($data->isInitialized('publishAllPorts') && null !== $data->getPublishAllPorts()) {
            $dataArray['PublishAllPorts'] = $data->getPublishAllPorts();
        }
        if ($data->isInitialized('readonlyRootfs') && null !== $data->getReadonlyRootfs()) {
            $dataArray['ReadonlyRootfs'] = $data->getReadonlyRootfs();
        }
        if ($data->isInitialized('securityOpt') && null !== $data->getSecurityOpt()) {
            $values_24 = [];
            foreach ($data->getSecurityOpt() as $value_24) {
                $values_24[] = $value_24;
            }
            $dataArray['SecurityOpt'] = $values_24;
        }
        if ($data->isInitialized('storageOpt') && null !== $data->getStorageOpt()) {
            $values_25 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getStorageOpt() as $key_2 => $value_25) {
                $values_25[$key_2] = $value_25;
            }
            $dataArray['StorageOpt'] = $values_25;
        }
        if ($data->isInitialized('tmpfs') && null !== $data->getTmpfs()) {
            $values_26 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getTmpfs() as $key_3 => $value_26) {
                $values_26[$key_3] = $value_26;
            }
            $dataArray['Tmpfs'] = $values_26;
        }
        if ($data->isInitialized('uTSMode') && null !== $data->getUTSMode()) {
            $dataArray['UTSMode'] = $data->getUTSMode();
        }
        if ($data->isInitialized('usernsMode') && null !== $data->getUsernsMode()) {
            $dataArray['UsernsMode'] = $data->getUsernsMode();
        }
        if ($data->isInitialized('shmSize') && null !== $data->getShmSize()) {
            $dataArray['ShmSize'] = $data->getShmSize();
        }
        if ($data->isInitialized('sysctls') && null !== $data->getSysctls()) {
            $values_27 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getSysctls() as $key_4 => $value_27) {
                $values_27[$key_4] = $value_27;
            }
            $dataArray['Sysctls'] = $values_27;
        }
        if ($data->isInitialized('runtime') && null !== $data->getRuntime()) {
            $dataArray['Runtime'] = $data->getRuntime();
        }
        if ($data->isInitialized('isolation') && null !== $data->getIsolation()) {
            $dataArray['Isolation'] = $data->getIsolation();
        }
        if ($data->isInitialized('maskedPaths') && null !== $data->getMaskedPaths()) {
            $values_28 = [];
            foreach ($data->getMaskedPaths() as $value_28) {
                $values_28[] = $value_28;
            }
            $dataArray['MaskedPaths'] = $values_28;
        }
        if ($data->isInitialized('readonlyPaths') && null !== $data->getReadonlyPaths()) {
            $values_29 = [];
            foreach ($data->getReadonlyPaths() as $value_29) {
                $values_29[] = $value_29;
            }
            $dataArray['ReadonlyPaths'] = $values_29;
        }
        foreach ($data->additionalPropertyEntries() as $key_5 => $value_30) {
            if (preg_match('/.*/', (string) $key_5)) {
                $dataArray[$key_5] = $value_30;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\HostConfig::class => false];
    }
}
