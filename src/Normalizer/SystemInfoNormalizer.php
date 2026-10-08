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

class SystemInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SystemInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SystemInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\SystemInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('MemoryLimit', $data) && \is_int($data['MemoryLimit'])) {
            $data['MemoryLimit'] = (bool) $data['MemoryLimit'];
        }
        if (\array_key_exists('SwapLimit', $data) && \is_int($data['SwapLimit'])) {
            $data['SwapLimit'] = (bool) $data['SwapLimit'];
        }
        if (\array_key_exists('KernelMemoryTCP', $data) && \is_int($data['KernelMemoryTCP'])) {
            $data['KernelMemoryTCP'] = (bool) $data['KernelMemoryTCP'];
        }
        if (\array_key_exists('CpuCfsPeriod', $data) && \is_int($data['CpuCfsPeriod'])) {
            $data['CpuCfsPeriod'] = (bool) $data['CpuCfsPeriod'];
        }
        if (\array_key_exists('CpuCfsQuota', $data) && \is_int($data['CpuCfsQuota'])) {
            $data['CpuCfsQuota'] = (bool) $data['CpuCfsQuota'];
        }
        if (\array_key_exists('CPUShares', $data) && \is_int($data['CPUShares'])) {
            $data['CPUShares'] = (bool) $data['CPUShares'];
        }
        if (\array_key_exists('CPUSet', $data) && \is_int($data['CPUSet'])) {
            $data['CPUSet'] = (bool) $data['CPUSet'];
        }
        if (\array_key_exists('PidsLimit', $data) && \is_int($data['PidsLimit'])) {
            $data['PidsLimit'] = (bool) $data['PidsLimit'];
        }
        if (\array_key_exists('OomKillDisable', $data) && \is_int($data['OomKillDisable'])) {
            $data['OomKillDisable'] = (bool) $data['OomKillDisable'];
        }
        if (\array_key_exists('IPv4Forwarding', $data) && \is_int($data['IPv4Forwarding'])) {
            $data['IPv4Forwarding'] = (bool) $data['IPv4Forwarding'];
        }
        if (\array_key_exists('Debug', $data) && \is_int($data['Debug'])) {
            $data['Debug'] = (bool) $data['Debug'];
        }
        if (\array_key_exists('ExperimentalBuild', $data) && \is_int($data['ExperimentalBuild'])) {
            $data['ExperimentalBuild'] = (bool) $data['ExperimentalBuild'];
        }
        if (\array_key_exists('LiveRestoreEnabled', $data) && \is_int($data['LiveRestoreEnabled'])) {
            $data['LiveRestoreEnabled'] = (bool) $data['LiveRestoreEnabled'];
        }
        if (\array_key_exists('ID', $data) && null !== $data['ID']) {
            $object->setID($data['ID']);
            unset($data['ID']);
        } elseif (\array_key_exists('ID', $data) && null === $data['ID']) {
            $object->setID(null);
            unset($data['ID']);
        }
        if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
            $object->setContainers($data['Containers']);
            unset($data['Containers']);
        } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
            $object->setContainers(null);
            unset($data['Containers']);
        }
        if (\array_key_exists('ContainersRunning', $data) && null !== $data['ContainersRunning']) {
            $object->setContainersRunning($data['ContainersRunning']);
            unset($data['ContainersRunning']);
        } elseif (\array_key_exists('ContainersRunning', $data) && null === $data['ContainersRunning']) {
            $object->setContainersRunning(null);
            unset($data['ContainersRunning']);
        }
        if (\array_key_exists('ContainersPaused', $data) && null !== $data['ContainersPaused']) {
            $object->setContainersPaused($data['ContainersPaused']);
            unset($data['ContainersPaused']);
        } elseif (\array_key_exists('ContainersPaused', $data) && null === $data['ContainersPaused']) {
            $object->setContainersPaused(null);
            unset($data['ContainersPaused']);
        }
        if (\array_key_exists('ContainersStopped', $data) && null !== $data['ContainersStopped']) {
            $object->setContainersStopped($data['ContainersStopped']);
            unset($data['ContainersStopped']);
        } elseif (\array_key_exists('ContainersStopped', $data) && null === $data['ContainersStopped']) {
            $object->setContainersStopped(null);
            unset($data['ContainersStopped']);
        }
        if (\array_key_exists('Images', $data) && null !== $data['Images']) {
            $object->setImages($data['Images']);
            unset($data['Images']);
        } elseif (\array_key_exists('Images', $data) && null === $data['Images']) {
            $object->setImages(null);
            unset($data['Images']);
        }
        if (\array_key_exists('Driver', $data) && null !== $data['Driver']) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && null === $data['Driver']) {
            $object->setDriver(null);
            unset($data['Driver']);
        }
        if (\array_key_exists('DriverStatus', $data) && null !== $data['DriverStatus']) {
            $values = [];
            foreach ($data['DriverStatus'] as $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values[] = $values_1;
            }
            $object->setDriverStatus($values);
            unset($data['DriverStatus']);
        } elseif (\array_key_exists('DriverStatus', $data) && null === $data['DriverStatus']) {
            $object->setDriverStatus(null);
            unset($data['DriverStatus']);
        }
        if (\array_key_exists('DockerRootDir', $data) && null !== $data['DockerRootDir']) {
            $object->setDockerRootDir($data['DockerRootDir']);
            unset($data['DockerRootDir']);
        } elseif (\array_key_exists('DockerRootDir', $data) && null === $data['DockerRootDir']) {
            $object->setDockerRootDir(null);
            unset($data['DockerRootDir']);
        }
        if (\array_key_exists('Plugins', $data) && null !== $data['Plugins']) {
            $object->setPlugins($this->denormalizer->denormalize($data['Plugins'], \Docker\API\Model\PluginsInfo::class, 'json', $context));
            unset($data['Plugins']);
        } elseif (\array_key_exists('Plugins', $data) && null === $data['Plugins']) {
            $object->setPlugins(null);
            unset($data['Plugins']);
        }
        if (\array_key_exists('MemoryLimit', $data) && null !== $data['MemoryLimit']) {
            $object->setMemoryLimit($data['MemoryLimit']);
            unset($data['MemoryLimit']);
        } elseif (\array_key_exists('MemoryLimit', $data) && null === $data['MemoryLimit']) {
            $object->setMemoryLimit(null);
            unset($data['MemoryLimit']);
        }
        if (\array_key_exists('SwapLimit', $data) && null !== $data['SwapLimit']) {
            $object->setSwapLimit($data['SwapLimit']);
            unset($data['SwapLimit']);
        } elseif (\array_key_exists('SwapLimit', $data) && null === $data['SwapLimit']) {
            $object->setSwapLimit(null);
            unset($data['SwapLimit']);
        }
        if (\array_key_exists('KernelMemoryTCP', $data) && null !== $data['KernelMemoryTCP']) {
            $object->setKernelMemoryTCP($data['KernelMemoryTCP']);
            unset($data['KernelMemoryTCP']);
        } elseif (\array_key_exists('KernelMemoryTCP', $data) && null === $data['KernelMemoryTCP']) {
            $object->setKernelMemoryTCP(null);
            unset($data['KernelMemoryTCP']);
        }
        if (\array_key_exists('CpuCfsPeriod', $data) && null !== $data['CpuCfsPeriod']) {
            $object->setCpuCfsPeriod($data['CpuCfsPeriod']);
            unset($data['CpuCfsPeriod']);
        } elseif (\array_key_exists('CpuCfsPeriod', $data) && null === $data['CpuCfsPeriod']) {
            $object->setCpuCfsPeriod(null);
            unset($data['CpuCfsPeriod']);
        }
        if (\array_key_exists('CpuCfsQuota', $data) && null !== $data['CpuCfsQuota']) {
            $object->setCpuCfsQuota($data['CpuCfsQuota']);
            unset($data['CpuCfsQuota']);
        } elseif (\array_key_exists('CpuCfsQuota', $data) && null === $data['CpuCfsQuota']) {
            $object->setCpuCfsQuota(null);
            unset($data['CpuCfsQuota']);
        }
        if (\array_key_exists('CPUShares', $data) && null !== $data['CPUShares']) {
            $object->setCPUShares($data['CPUShares']);
            unset($data['CPUShares']);
        } elseif (\array_key_exists('CPUShares', $data) && null === $data['CPUShares']) {
            $object->setCPUShares(null);
            unset($data['CPUShares']);
        }
        if (\array_key_exists('CPUSet', $data) && null !== $data['CPUSet']) {
            $object->setCPUSet($data['CPUSet']);
            unset($data['CPUSet']);
        } elseif (\array_key_exists('CPUSet', $data) && null === $data['CPUSet']) {
            $object->setCPUSet(null);
            unset($data['CPUSet']);
        }
        if (\array_key_exists('PidsLimit', $data) && null !== $data['PidsLimit']) {
            $object->setPidsLimit($data['PidsLimit']);
            unset($data['PidsLimit']);
        } elseif (\array_key_exists('PidsLimit', $data) && null === $data['PidsLimit']) {
            $object->setPidsLimit(null);
            unset($data['PidsLimit']);
        }
        if (\array_key_exists('OomKillDisable', $data) && null !== $data['OomKillDisable']) {
            $object->setOomKillDisable($data['OomKillDisable']);
            unset($data['OomKillDisable']);
        } elseif (\array_key_exists('OomKillDisable', $data) && null === $data['OomKillDisable']) {
            $object->setOomKillDisable(null);
            unset($data['OomKillDisable']);
        }
        if (\array_key_exists('IPv4Forwarding', $data) && null !== $data['IPv4Forwarding']) {
            $object->setIPv4Forwarding($data['IPv4Forwarding']);
            unset($data['IPv4Forwarding']);
        } elseif (\array_key_exists('IPv4Forwarding', $data) && null === $data['IPv4Forwarding']) {
            $object->setIPv4Forwarding(null);
            unset($data['IPv4Forwarding']);
        }
        if (\array_key_exists('Debug', $data) && null !== $data['Debug']) {
            $object->setDebug($data['Debug']);
            unset($data['Debug']);
        } elseif (\array_key_exists('Debug', $data) && null === $data['Debug']) {
            $object->setDebug(null);
            unset($data['Debug']);
        }
        if (\array_key_exists('NFd', $data) && null !== $data['NFd']) {
            $object->setNFd($data['NFd']);
            unset($data['NFd']);
        } elseif (\array_key_exists('NFd', $data) && null === $data['NFd']) {
            $object->setNFd(null);
            unset($data['NFd']);
        }
        if (\array_key_exists('NGoroutines', $data) && null !== $data['NGoroutines']) {
            $object->setNGoroutines($data['NGoroutines']);
            unset($data['NGoroutines']);
        } elseif (\array_key_exists('NGoroutines', $data) && null === $data['NGoroutines']) {
            $object->setNGoroutines(null);
            unset($data['NGoroutines']);
        }
        if (\array_key_exists('SystemTime', $data) && null !== $data['SystemTime']) {
            $object->setSystemTime($data['SystemTime']);
            unset($data['SystemTime']);
        } elseif (\array_key_exists('SystemTime', $data) && null === $data['SystemTime']) {
            $object->setSystemTime(null);
            unset($data['SystemTime']);
        }
        if (\array_key_exists('LoggingDriver', $data) && null !== $data['LoggingDriver']) {
            $object->setLoggingDriver($data['LoggingDriver']);
            unset($data['LoggingDriver']);
        } elseif (\array_key_exists('LoggingDriver', $data) && null === $data['LoggingDriver']) {
            $object->setLoggingDriver(null);
            unset($data['LoggingDriver']);
        }
        if (\array_key_exists('CgroupDriver', $data) && null !== $data['CgroupDriver']) {
            $object->setCgroupDriver($data['CgroupDriver']);
            unset($data['CgroupDriver']);
        } elseif (\array_key_exists('CgroupDriver', $data) && null === $data['CgroupDriver']) {
            $object->setCgroupDriver(null);
            unset($data['CgroupDriver']);
        }
        if (\array_key_exists('CgroupVersion', $data) && null !== $data['CgroupVersion']) {
            $object->setCgroupVersion($data['CgroupVersion']);
            unset($data['CgroupVersion']);
        } elseif (\array_key_exists('CgroupVersion', $data) && null === $data['CgroupVersion']) {
            $object->setCgroupVersion(null);
            unset($data['CgroupVersion']);
        }
        if (\array_key_exists('NEventsListener', $data) && null !== $data['NEventsListener']) {
            $object->setNEventsListener($data['NEventsListener']);
            unset($data['NEventsListener']);
        } elseif (\array_key_exists('NEventsListener', $data) && null === $data['NEventsListener']) {
            $object->setNEventsListener(null);
            unset($data['NEventsListener']);
        }
        if (\array_key_exists('KernelVersion', $data) && null !== $data['KernelVersion']) {
            $object->setKernelVersion($data['KernelVersion']);
            unset($data['KernelVersion']);
        } elseif (\array_key_exists('KernelVersion', $data) && null === $data['KernelVersion']) {
            $object->setKernelVersion(null);
            unset($data['KernelVersion']);
        }
        if (\array_key_exists('OperatingSystem', $data) && null !== $data['OperatingSystem']) {
            $object->setOperatingSystem($data['OperatingSystem']);
            unset($data['OperatingSystem']);
        } elseif (\array_key_exists('OperatingSystem', $data) && null === $data['OperatingSystem']) {
            $object->setOperatingSystem(null);
            unset($data['OperatingSystem']);
        }
        if (\array_key_exists('OSVersion', $data) && null !== $data['OSVersion']) {
            $object->setOSVersion($data['OSVersion']);
            unset($data['OSVersion']);
        } elseif (\array_key_exists('OSVersion', $data) && null === $data['OSVersion']) {
            $object->setOSVersion(null);
            unset($data['OSVersion']);
        }
        if (\array_key_exists('OSType', $data) && null !== $data['OSType']) {
            $object->setOSType($data['OSType']);
            unset($data['OSType']);
        } elseif (\array_key_exists('OSType', $data) && null === $data['OSType']) {
            $object->setOSType(null);
            unset($data['OSType']);
        }
        if (\array_key_exists('Architecture', $data) && null !== $data['Architecture']) {
            $object->setArchitecture($data['Architecture']);
            unset($data['Architecture']);
        } elseif (\array_key_exists('Architecture', $data) && null === $data['Architecture']) {
            $object->setArchitecture(null);
            unset($data['Architecture']);
        }
        if (\array_key_exists('NCPU', $data) && null !== $data['NCPU']) {
            $object->setNCPU($data['NCPU']);
            unset($data['NCPU']);
        } elseif (\array_key_exists('NCPU', $data) && null === $data['NCPU']) {
            $object->setNCPU(null);
            unset($data['NCPU']);
        }
        if (\array_key_exists('MemTotal', $data) && null !== $data['MemTotal']) {
            $object->setMemTotal($data['MemTotal']);
            unset($data['MemTotal']);
        } elseif (\array_key_exists('MemTotal', $data) && null === $data['MemTotal']) {
            $object->setMemTotal(null);
            unset($data['MemTotal']);
        }
        if (\array_key_exists('IndexServerAddress', $data) && null !== $data['IndexServerAddress']) {
            $object->setIndexServerAddress($data['IndexServerAddress']);
            unset($data['IndexServerAddress']);
        } elseif (\array_key_exists('IndexServerAddress', $data) && null === $data['IndexServerAddress']) {
            $object->setIndexServerAddress(null);
            unset($data['IndexServerAddress']);
        }
        if (\array_key_exists('RegistryConfig', $data) && null !== $data['RegistryConfig']) {
            $object->setRegistryConfig($this->denormalizer->denormalize($data['RegistryConfig'], \Docker\API\Model\RegistryServiceConfig::class, 'json', $context));
            unset($data['RegistryConfig']);
        } elseif (\array_key_exists('RegistryConfig', $data) && null === $data['RegistryConfig']) {
            $object->setRegistryConfig(null);
            unset($data['RegistryConfig']);
        }
        if (\array_key_exists('GenericResources', $data) && null !== $data['GenericResources']) {
            $values_2 = [];
            foreach ($data['GenericResources'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\GenericResourcesItem::class, 'json', $context);
            }
            $object->setGenericResources($values_2);
            unset($data['GenericResources']);
        } elseif (\array_key_exists('GenericResources', $data) && null === $data['GenericResources']) {
            $object->setGenericResources(null);
            unset($data['GenericResources']);
        }
        if (\array_key_exists('HttpProxy', $data) && null !== $data['HttpProxy']) {
            $object->setHttpProxy($data['HttpProxy']);
            unset($data['HttpProxy']);
        } elseif (\array_key_exists('HttpProxy', $data) && null === $data['HttpProxy']) {
            $object->setHttpProxy(null);
            unset($data['HttpProxy']);
        }
        if (\array_key_exists('HttpsProxy', $data) && null !== $data['HttpsProxy']) {
            $object->setHttpsProxy($data['HttpsProxy']);
            unset($data['HttpsProxy']);
        } elseif (\array_key_exists('HttpsProxy', $data) && null === $data['HttpsProxy']) {
            $object->setHttpsProxy(null);
            unset($data['HttpsProxy']);
        }
        if (\array_key_exists('NoProxy', $data) && null !== $data['NoProxy']) {
            $object->setNoProxy($data['NoProxy']);
            unset($data['NoProxy']);
        } elseif (\array_key_exists('NoProxy', $data) && null === $data['NoProxy']) {
            $object->setNoProxy(null);
            unset($data['NoProxy']);
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
            unset($data['Name']);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values_3 = [];
            foreach ($data['Labels'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setLabels($values_3);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
            unset($data['Labels']);
        }
        if (\array_key_exists('ExperimentalBuild', $data) && null !== $data['ExperimentalBuild']) {
            $object->setExperimentalBuild($data['ExperimentalBuild']);
            unset($data['ExperimentalBuild']);
        } elseif (\array_key_exists('ExperimentalBuild', $data) && null === $data['ExperimentalBuild']) {
            $object->setExperimentalBuild(null);
            unset($data['ExperimentalBuild']);
        }
        if (\array_key_exists('ServerVersion', $data) && null !== $data['ServerVersion']) {
            $object->setServerVersion($data['ServerVersion']);
            unset($data['ServerVersion']);
        } elseif (\array_key_exists('ServerVersion', $data) && null === $data['ServerVersion']) {
            $object->setServerVersion(null);
            unset($data['ServerVersion']);
        }
        if (\array_key_exists('Runtimes', $data) && null !== $data['Runtimes']) {
            $values_4 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Runtimes'] as $key => $value_4) {
                $values_4[$key] = $this->denormalizer->denormalize($value_4, \Docker\API\Model\Runtime::class, 'json', $context);
            }
            $object->setRuntimes($values_4);
            unset($data['Runtimes']);
        } elseif (\array_key_exists('Runtimes', $data) && null === $data['Runtimes']) {
            $object->setRuntimes(null);
            unset($data['Runtimes']);
        }
        if (\array_key_exists('DefaultRuntime', $data) && null !== $data['DefaultRuntime']) {
            $object->setDefaultRuntime($data['DefaultRuntime']);
            unset($data['DefaultRuntime']);
        } elseif (\array_key_exists('DefaultRuntime', $data) && null === $data['DefaultRuntime']) {
            $object->setDefaultRuntime(null);
            unset($data['DefaultRuntime']);
        }
        if (\array_key_exists('Swarm', $data) && null !== $data['Swarm']) {
            $object->setSwarm($this->denormalizer->denormalize($data['Swarm'], \Docker\API\Model\SwarmInfo::class, 'json', $context));
            unset($data['Swarm']);
        } elseif (\array_key_exists('Swarm', $data) && null === $data['Swarm']) {
            $object->setSwarm(null);
            unset($data['Swarm']);
        }
        if (\array_key_exists('LiveRestoreEnabled', $data) && null !== $data['LiveRestoreEnabled']) {
            $object->setLiveRestoreEnabled($data['LiveRestoreEnabled']);
            unset($data['LiveRestoreEnabled']);
        } elseif (\array_key_exists('LiveRestoreEnabled', $data) && null === $data['LiveRestoreEnabled']) {
            $object->setLiveRestoreEnabled(null);
            unset($data['LiveRestoreEnabled']);
        }
        if (\array_key_exists('Isolation', $data) && null !== $data['Isolation']) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        } elseif (\array_key_exists('Isolation', $data) && null === $data['Isolation']) {
            $object->setIsolation(null);
            unset($data['Isolation']);
        }
        if (\array_key_exists('InitBinary', $data) && null !== $data['InitBinary']) {
            $object->setInitBinary($data['InitBinary']);
            unset($data['InitBinary']);
        } elseif (\array_key_exists('InitBinary', $data) && null === $data['InitBinary']) {
            $object->setInitBinary(null);
            unset($data['InitBinary']);
        }
        if (\array_key_exists('ContainerdCommit', $data) && null !== $data['ContainerdCommit']) {
            $object->setContainerdCommit($this->denormalizer->denormalize($data['ContainerdCommit'], \Docker\API\Model\Commit::class, 'json', $context));
            unset($data['ContainerdCommit']);
        } elseif (\array_key_exists('ContainerdCommit', $data) && null === $data['ContainerdCommit']) {
            $object->setContainerdCommit(null);
            unset($data['ContainerdCommit']);
        }
        if (\array_key_exists('RuncCommit', $data) && null !== $data['RuncCommit']) {
            $object->setRuncCommit($this->denormalizer->denormalize($data['RuncCommit'], \Docker\API\Model\Commit::class, 'json', $context));
            unset($data['RuncCommit']);
        } elseif (\array_key_exists('RuncCommit', $data) && null === $data['RuncCommit']) {
            $object->setRuncCommit(null);
            unset($data['RuncCommit']);
        }
        if (\array_key_exists('InitCommit', $data) && null !== $data['InitCommit']) {
            $object->setInitCommit($this->denormalizer->denormalize($data['InitCommit'], \Docker\API\Model\Commit::class, 'json', $context));
            unset($data['InitCommit']);
        } elseif (\array_key_exists('InitCommit', $data) && null === $data['InitCommit']) {
            $object->setInitCommit(null);
            unset($data['InitCommit']);
        }
        if (\array_key_exists('SecurityOptions', $data) && null !== $data['SecurityOptions']) {
            $values_5 = [];
            foreach ($data['SecurityOptions'] as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setSecurityOptions($values_5);
            unset($data['SecurityOptions']);
        } elseif (\array_key_exists('SecurityOptions', $data) && null === $data['SecurityOptions']) {
            $object->setSecurityOptions(null);
            unset($data['SecurityOptions']);
        }
        if (\array_key_exists('ProductLicense', $data) && null !== $data['ProductLicense']) {
            $object->setProductLicense($data['ProductLicense']);
            unset($data['ProductLicense']);
        } elseif (\array_key_exists('ProductLicense', $data) && null === $data['ProductLicense']) {
            $object->setProductLicense(null);
            unset($data['ProductLicense']);
        }
        if (\array_key_exists('DefaultAddressPools', $data) && null !== $data['DefaultAddressPools']) {
            $values_6 = [];
            foreach ($data['DefaultAddressPools'] as $value_6) {
                $values_6[] = $this->denormalizer->denormalize($value_6, \Docker\API\Model\SystemInfoDefaultAddressPoolsItem::class, 'json', $context);
            }
            $object->setDefaultAddressPools($values_6);
            unset($data['DefaultAddressPools']);
        } elseif (\array_key_exists('DefaultAddressPools', $data) && null === $data['DefaultAddressPools']) {
            $object->setDefaultAddressPools(null);
            unset($data['DefaultAddressPools']);
        }
        if (\array_key_exists('FirewallBackend', $data) && null !== $data['FirewallBackend']) {
            $object->setFirewallBackend($this->denormalizer->denormalize($data['FirewallBackend'], \Docker\API\Model\FirewallInfo::class, 'json', $context));
            unset($data['FirewallBackend']);
        } elseif (\array_key_exists('FirewallBackend', $data) && null === $data['FirewallBackend']) {
            $object->setFirewallBackend(null);
            unset($data['FirewallBackend']);
        }
        if (\array_key_exists('DiscoveredDevices', $data) && null !== $data['DiscoveredDevices']) {
            $values_7 = [];
            foreach ($data['DiscoveredDevices'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, \Docker\API\Model\DeviceInfo::class, 'json', $context);
            }
            $object->setDiscoveredDevices($values_7);
            unset($data['DiscoveredDevices']);
        } elseif (\array_key_exists('DiscoveredDevices', $data) && null === $data['DiscoveredDevices']) {
            $object->setDiscoveredDevices(null);
            unset($data['DiscoveredDevices']);
        }
        if (\array_key_exists('Warnings', $data) && null !== $data['Warnings']) {
            $values_8 = [];
            foreach ($data['Warnings'] as $value_8) {
                $values_8[] = $value_8;
            }
            $object->setWarnings($values_8);
            unset($data['Warnings']);
        } elseif (\array_key_exists('Warnings', $data) && null === $data['Warnings']) {
            $object->setWarnings(null);
            unset($data['Warnings']);
        }
        if (\array_key_exists('CDISpecDirs', $data) && null !== $data['CDISpecDirs']) {
            $values_9 = [];
            foreach ($data['CDISpecDirs'] as $value_9) {
                $values_9[] = $value_9;
            }
            $object->setCDISpecDirs($values_9);
            unset($data['CDISpecDirs']);
        } elseif (\array_key_exists('CDISpecDirs', $data) && null === $data['CDISpecDirs']) {
            $object->setCDISpecDirs(null);
            unset($data['CDISpecDirs']);
        }
        if (\array_key_exists('Containerd', $data) && null !== $data['Containerd']) {
            $object->setContainerd($this->denormalizer->denormalize($data['Containerd'], \Docker\API\Model\ContainerdInfo::class, 'json', $context));
            unset($data['Containerd']);
        } elseif (\array_key_exists('Containerd', $data) && null === $data['Containerd']) {
            $object->setContainerd(null);
            unset($data['Containerd']);
        }
        foreach ($data as $key_1 => $value_10) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_10;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('iD') && null !== $data->getID()) {
            $dataArray['ID'] = $data->getID();
        }
        if ($data->isInitialized('containers') && null !== $data->getContainers()) {
            $dataArray['Containers'] = $data->getContainers();
        }
        if ($data->isInitialized('containersRunning') && null !== $data->getContainersRunning()) {
            $dataArray['ContainersRunning'] = $data->getContainersRunning();
        }
        if ($data->isInitialized('containersPaused') && null !== $data->getContainersPaused()) {
            $dataArray['ContainersPaused'] = $data->getContainersPaused();
        }
        if ($data->isInitialized('containersStopped') && null !== $data->getContainersStopped()) {
            $dataArray['ContainersStopped'] = $data->getContainersStopped();
        }
        if ($data->isInitialized('images') && null !== $data->getImages()) {
            $dataArray['Images'] = $data->getImages();
        }
        if ($data->isInitialized('driver') && null !== $data->getDriver()) {
            $dataArray['Driver'] = $data->getDriver();
        }
        if ($data->isInitialized('driverStatus') && null !== $data->getDriverStatus()) {
            $values = [];
            foreach ($data->getDriverStatus() as $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values[] = $values_1;
            }
            $dataArray['DriverStatus'] = $values;
        }
        if ($data->isInitialized('dockerRootDir') && null !== $data->getDockerRootDir()) {
            $dataArray['DockerRootDir'] = $data->getDockerRootDir();
        }
        if ($data->isInitialized('plugins') && null !== $data->getPlugins()) {
            $dataArray['Plugins'] = null === $data->getPlugins() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getPlugins(), 'json', $context));
        }
        if ($data->isInitialized('memoryLimit') && null !== $data->getMemoryLimit()) {
            $dataArray['MemoryLimit'] = $data->getMemoryLimit();
        }
        if ($data->isInitialized('swapLimit') && null !== $data->getSwapLimit()) {
            $dataArray['SwapLimit'] = $data->getSwapLimit();
        }
        if ($data->isInitialized('kernelMemoryTCP') && null !== $data->getKernelMemoryTCP()) {
            $dataArray['KernelMemoryTCP'] = $data->getKernelMemoryTCP();
        }
        if ($data->isInitialized('cpuCfsPeriod') && null !== $data->getCpuCfsPeriod()) {
            $dataArray['CpuCfsPeriod'] = $data->getCpuCfsPeriod();
        }
        if ($data->isInitialized('cpuCfsQuota') && null !== $data->getCpuCfsQuota()) {
            $dataArray['CpuCfsQuota'] = $data->getCpuCfsQuota();
        }
        if ($data->isInitialized('cPUShares') && null !== $data->getCPUShares()) {
            $dataArray['CPUShares'] = $data->getCPUShares();
        }
        if ($data->isInitialized('cPUSet') && null !== $data->getCPUSet()) {
            $dataArray['CPUSet'] = $data->getCPUSet();
        }
        if ($data->isInitialized('pidsLimit') && null !== $data->getPidsLimit()) {
            $dataArray['PidsLimit'] = $data->getPidsLimit();
        }
        if ($data->isInitialized('oomKillDisable') && null !== $data->getOomKillDisable()) {
            $dataArray['OomKillDisable'] = $data->getOomKillDisable();
        }
        if ($data->isInitialized('iPv4Forwarding') && null !== $data->getIPv4Forwarding()) {
            $dataArray['IPv4Forwarding'] = $data->getIPv4Forwarding();
        }
        if ($data->isInitialized('debug') && null !== $data->getDebug()) {
            $dataArray['Debug'] = $data->getDebug();
        }
        if ($data->isInitialized('nFd') && null !== $data->getNFd()) {
            $dataArray['NFd'] = $data->getNFd();
        }
        if ($data->isInitialized('nGoroutines') && null !== $data->getNGoroutines()) {
            $dataArray['NGoroutines'] = $data->getNGoroutines();
        }
        if ($data->isInitialized('systemTime') && null !== $data->getSystemTime()) {
            $dataArray['SystemTime'] = $data->getSystemTime();
        }
        if ($data->isInitialized('loggingDriver') && null !== $data->getLoggingDriver()) {
            $dataArray['LoggingDriver'] = $data->getLoggingDriver();
        }
        if ($data->isInitialized('cgroupDriver') && null !== $data->getCgroupDriver()) {
            $dataArray['CgroupDriver'] = $data->getCgroupDriver();
        }
        if ($data->isInitialized('cgroupVersion') && null !== $data->getCgroupVersion()) {
            $dataArray['CgroupVersion'] = $data->getCgroupVersion();
        }
        if ($data->isInitialized('nEventsListener') && null !== $data->getNEventsListener()) {
            $dataArray['NEventsListener'] = $data->getNEventsListener();
        }
        if ($data->isInitialized('kernelVersion') && null !== $data->getKernelVersion()) {
            $dataArray['KernelVersion'] = $data->getKernelVersion();
        }
        if ($data->isInitialized('operatingSystem') && null !== $data->getOperatingSystem()) {
            $dataArray['OperatingSystem'] = $data->getOperatingSystem();
        }
        if ($data->isInitialized('oSVersion') && null !== $data->getOSVersion()) {
            $dataArray['OSVersion'] = $data->getOSVersion();
        }
        if ($data->isInitialized('oSType') && null !== $data->getOSType()) {
            $dataArray['OSType'] = $data->getOSType();
        }
        if ($data->isInitialized('architecture') && null !== $data->getArchitecture()) {
            $dataArray['Architecture'] = $data->getArchitecture();
        }
        if ($data->isInitialized('nCPU') && null !== $data->getNCPU()) {
            $dataArray['NCPU'] = $data->getNCPU();
        }
        if ($data->isInitialized('memTotal') && null !== $data->getMemTotal()) {
            $dataArray['MemTotal'] = $data->getMemTotal();
        }
        if ($data->isInitialized('indexServerAddress') && null !== $data->getIndexServerAddress()) {
            $dataArray['IndexServerAddress'] = $data->getIndexServerAddress();
        }
        if ($data->isInitialized('registryConfig') && null !== $data->getRegistryConfig()) {
            $dataArray['RegistryConfig'] = null === $data->getRegistryConfig() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getRegistryConfig(), 'json', $context));
        }
        if ($data->isInitialized('genericResources') && null !== $data->getGenericResources()) {
            $values_2 = [];
            foreach ($data->getGenericResources() as $value_2) {
                $values_2[] = null === $value_2 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_2, 'json', $context));
            }
            $dataArray['GenericResources'] = $values_2;
        }
        if ($data->isInitialized('httpProxy') && null !== $data->getHttpProxy()) {
            $dataArray['HttpProxy'] = $data->getHttpProxy();
        }
        if ($data->isInitialized('httpsProxy') && null !== $data->getHttpsProxy()) {
            $dataArray['HttpsProxy'] = $data->getHttpsProxy();
        }
        if ($data->isInitialized('noProxy') && null !== $data->getNoProxy()) {
            $dataArray['NoProxy'] = $data->getNoProxy();
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values_3 = [];
            foreach ($data->getLabels() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['Labels'] = $values_3;
        }
        if ($data->isInitialized('experimentalBuild') && null !== $data->getExperimentalBuild()) {
            $dataArray['ExperimentalBuild'] = $data->getExperimentalBuild();
        }
        if ($data->isInitialized('serverVersion') && null !== $data->getServerVersion()) {
            $dataArray['ServerVersion'] = $data->getServerVersion();
        }
        if ($data->isInitialized('runtimes') && null !== $data->getRuntimes()) {
            $values_4 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getRuntimes() as $key => $value_4) {
                $values_4[$key] = null === $value_4 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_4, 'json', $context));
            }
            $dataArray['Runtimes'] = $values_4;
        }
        if ($data->isInitialized('defaultRuntime') && null !== $data->getDefaultRuntime()) {
            $dataArray['DefaultRuntime'] = $data->getDefaultRuntime();
        }
        if ($data->isInitialized('swarm') && null !== $data->getSwarm()) {
            $dataArray['Swarm'] = null === $data->getSwarm() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getSwarm(), 'json', $context));
        }
        if ($data->isInitialized('liveRestoreEnabled') && null !== $data->getLiveRestoreEnabled()) {
            $dataArray['LiveRestoreEnabled'] = $data->getLiveRestoreEnabled();
        }
        if ($data->isInitialized('isolation') && null !== $data->getIsolation()) {
            $dataArray['Isolation'] = $data->getIsolation();
        }
        if ($data->isInitialized('initBinary') && null !== $data->getInitBinary()) {
            $dataArray['InitBinary'] = $data->getInitBinary();
        }
        if ($data->isInitialized('containerdCommit') && null !== $data->getContainerdCommit()) {
            $dataArray['ContainerdCommit'] = null === $data->getContainerdCommit() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getContainerdCommit(), 'json', $context));
        }
        if ($data->isInitialized('runcCommit') && null !== $data->getRuncCommit()) {
            $dataArray['RuncCommit'] = null === $data->getRuncCommit() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getRuncCommit(), 'json', $context));
        }
        if ($data->isInitialized('initCommit') && null !== $data->getInitCommit()) {
            $dataArray['InitCommit'] = null === $data->getInitCommit() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getInitCommit(), 'json', $context));
        }
        if ($data->isInitialized('securityOptions') && null !== $data->getSecurityOptions()) {
            $values_5 = [];
            foreach ($data->getSecurityOptions() as $value_5) {
                $values_5[] = $value_5;
            }
            $dataArray['SecurityOptions'] = $values_5;
        }
        if ($data->isInitialized('productLicense') && null !== $data->getProductLicense()) {
            $dataArray['ProductLicense'] = $data->getProductLicense();
        }
        if ($data->isInitialized('defaultAddressPools') && null !== $data->getDefaultAddressPools()) {
            $values_6 = [];
            foreach ($data->getDefaultAddressPools() as $value_6) {
                $values_6[] = null === $value_6 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_6, 'json', $context));
            }
            $dataArray['DefaultAddressPools'] = $values_6;
        }
        if ($data->isInitialized('firewallBackend') && null !== $data->getFirewallBackend()) {
            $dataArray['FirewallBackend'] = null === $data->getFirewallBackend() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getFirewallBackend(), 'json', $context));
        }
        if ($data->isInitialized('discoveredDevices') && null !== $data->getDiscoveredDevices()) {
            $values_7 = [];
            foreach ($data->getDiscoveredDevices() as $value_7) {
                $values_7[] = null === $value_7 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_7, 'json', $context));
            }
            $dataArray['DiscoveredDevices'] = $values_7;
        }
        if ($data->isInitialized('warnings') && null !== $data->getWarnings()) {
            $values_8 = [];
            foreach ($data->getWarnings() as $value_8) {
                $values_8[] = $value_8;
            }
            $dataArray['Warnings'] = $values_8;
        }
        if ($data->isInitialized('cDISpecDirs') && null !== $data->getCDISpecDirs()) {
            $values_9 = [];
            foreach ($data->getCDISpecDirs() as $value_9) {
                $values_9[] = $value_9;
            }
            $dataArray['CDISpecDirs'] = $values_9;
        }
        if ($data->isInitialized('containerd') && null !== $data->getContainerd()) {
            $dataArray['Containerd'] = null === $data->getContainerd() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getContainerd(), 'json', $context));
        }
        foreach ($data->additionalPropertyEntries() as $key_1 => $value_10) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_10;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SystemInfo::class => false];
    }
}
