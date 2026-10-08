<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;
    protected $normalizers = [
        \Docker\API\Model\ImageHistoryResponseItem::class => ImageHistoryResponseItemNormalizer::class,

        \Docker\API\Model\Port::class => PortNormalizer::class,

        \Docker\API\Model\MountPoint::class => MountPointNormalizer::class,

        \Docker\API\Model\DeviceMapping::class => DeviceMappingNormalizer::class,

        \Docker\API\Model\DeviceRequest::class => DeviceRequestNormalizer::class,

        \Docker\API\Model\ThrottleDevice::class => ThrottleDeviceNormalizer::class,

        \Docker\API\Model\Mount::class => MountNormalizer::class,

        \Docker\API\Model\MountBindOptions::class => MountBindOptionsNormalizer::class,

        \Docker\API\Model\MountVolumeOptions::class => MountVolumeOptionsNormalizer::class,

        \Docker\API\Model\MountVolumeOptionsDriverConfig::class => MountVolumeOptionsDriverConfigNormalizer::class,

        \Docker\API\Model\MountTmpfsOptions::class => MountTmpfsOptionsNormalizer::class,

        \Docker\API\Model\RestartPolicy::class => RestartPolicyNormalizer::class,

        \Docker\API\Model\Resources::class => ResourcesNormalizer::class,

        \Docker\API\Model\ResourcesBlkioWeightDeviceItem::class => ResourcesBlkioWeightDeviceItemNormalizer::class,

        \Docker\API\Model\ResourcesUlimitsItem::class => ResourcesUlimitsItemNormalizer::class,

        \Docker\API\Model\Limit::class => LimitNormalizer::class,

        \Docker\API\Model\ResourceObject::class => ResourceObjectNormalizer::class,

        \Docker\API\Model\GenericResourcesItem::class => GenericResourcesItemNormalizer::class,

        \Docker\API\Model\GenericResourcesItemNamedResourceSpec::class => GenericResourcesItemNamedResourceSpecNormalizer::class,

        \Docker\API\Model\GenericResourcesItemDiscreteResourceSpec::class => GenericResourcesItemDiscreteResourceSpecNormalizer::class,

        \Docker\API\Model\HealthConfig::class => HealthConfigNormalizer::class,

        \Docker\API\Model\Health::class => HealthNormalizer::class,

        \Docker\API\Model\HealthcheckResult::class => HealthcheckResultNormalizer::class,

        \Docker\API\Model\HostConfig::class => HostConfigNormalizer::class,

        \Docker\API\Model\HostConfigLogConfig::class => HostConfigLogConfigNormalizer::class,

        \Docker\API\Model\ContainerConfig::class => ContainerConfigNormalizer::class,

        \Docker\API\Model\ImageConfig::class => ImageConfigNormalizer::class,

        \Docker\API\Model\NetworkingConfig::class => NetworkingConfigNormalizer::class,

        \Docker\API\Model\NetworkSettings::class => NetworkSettingsNormalizer::class,

        \Docker\API\Model\Address::class => AddressNormalizer::class,

        \Docker\API\Model\PortBinding::class => PortBindingNormalizer::class,

        \Docker\API\Model\DriverData::class => DriverDataNormalizer::class,

        \Docker\API\Model\FilesystemChange::class => FilesystemChangeNormalizer::class,

        \Docker\API\Model\ImageInspect::class => ImageInspectNormalizer::class,

        \Docker\API\Model\ImageInspectRootFS::class => ImageInspectRootFSNormalizer::class,

        \Docker\API\Model\ImageInspectMetadata::class => ImageInspectMetadataNormalizer::class,

        \Docker\API\Model\ImageSummary::class => ImageSummaryNormalizer::class,

        \Docker\API\Model\AuthConfig::class => AuthConfigNormalizer::class,

        \Docker\API\Model\ProcessConfig::class => ProcessConfigNormalizer::class,

        \Docker\API\Model\Volume::class => VolumeNormalizer::class,

        \Docker\API\Model\VolumeUsageData::class => VolumeUsageDataNormalizer::class,

        \Docker\API\Model\VolumeCreateOptions::class => VolumeCreateOptionsNormalizer::class,

        \Docker\API\Model\VolumeListResponse::class => VolumeListResponseNormalizer::class,

        \Docker\API\Model\Network::class => NetworkNormalizer::class,

        \Docker\API\Model\ConfigReference::class => ConfigReferenceNormalizer::class,

        \Docker\API\Model\IPAM::class => IPAMNormalizer::class,

        \Docker\API\Model\IPAMConfig::class => IPAMConfigNormalizer::class,

        \Docker\API\Model\NetworkContainer::class => NetworkContainerNormalizer::class,

        \Docker\API\Model\PeerInfo::class => PeerInfoNormalizer::class,

        \Docker\API\Model\NetworkCreateResponse::class => NetworkCreateResponseNormalizer::class,

        \Docker\API\Model\BuildInfo::class => BuildInfoNormalizer::class,

        \Docker\API\Model\BuildCache::class => BuildCacheNormalizer::class,

        \Docker\API\Model\ImageID::class => ImageIDNormalizer::class,

        \Docker\API\Model\CreateImageInfo::class => CreateImageInfoNormalizer::class,

        \Docker\API\Model\PushImageInfo::class => PushImageInfoNormalizer::class,

        \Docker\API\Model\ErrorDetail::class => ErrorDetailNormalizer::class,

        \Docker\API\Model\ProgressDetail::class => ProgressDetailNormalizer::class,

        \Docker\API\Model\ErrorResponse::class => ErrorResponseNormalizer::class,

        \Docker\API\Model\IdResponse::class => IdResponseNormalizer::class,

        \Docker\API\Model\EndpointSettings::class => EndpointSettingsNormalizer::class,

        \Docker\API\Model\EndpointIPAMConfig::class => EndpointIPAMConfigNormalizer::class,

        \Docker\API\Model\PluginMount::class => PluginMountNormalizer::class,

        \Docker\API\Model\PluginDevice::class => PluginDeviceNormalizer::class,

        \Docker\API\Model\PluginEnv::class => PluginEnvNormalizer::class,

        \Docker\API\Model\PluginInterfaceType::class => PluginInterfaceTypeNormalizer::class,

        \Docker\API\Model\PluginPrivilege::class => PluginPrivilegeNormalizer::class,

        \Docker\API\Model\Plugin::class => PluginNormalizer::class,

        \Docker\API\Model\PluginSettings::class => PluginSettingsNormalizer::class,

        \Docker\API\Model\PluginConfig::class => PluginConfigNormalizer::class,

        \Docker\API\Model\PluginConfigInterface::class => PluginConfigInterfaceNormalizer::class,

        \Docker\API\Model\PluginConfigUser::class => PluginConfigUserNormalizer::class,

        \Docker\API\Model\PluginConfigNetwork::class => PluginConfigNetworkNormalizer::class,

        \Docker\API\Model\PluginConfigLinux::class => PluginConfigLinuxNormalizer::class,

        \Docker\API\Model\PluginConfigArgs::class => PluginConfigArgsNormalizer::class,

        \Docker\API\Model\PluginConfigRootfs::class => PluginConfigRootfsNormalizer::class,

        \Docker\API\Model\ObjectVersion::class => ObjectVersionNormalizer::class,

        \Docker\API\Model\NodeSpec::class => NodeSpecNormalizer::class,

        \Docker\API\Model\Node::class => NodeNormalizer::class,

        \Docker\API\Model\NodeDescription::class => NodeDescriptionNormalizer::class,

        \Docker\API\Model\Platform::class => PlatformNormalizer::class,

        \Docker\API\Model\EngineDescription::class => EngineDescriptionNormalizer::class,

        \Docker\API\Model\EngineDescriptionPluginsItem::class => EngineDescriptionPluginsItemNormalizer::class,

        \Docker\API\Model\TLSInfo::class => TLSInfoNormalizer::class,

        \Docker\API\Model\NodeStatus::class => NodeStatusNormalizer::class,

        \Docker\API\Model\ManagerStatus::class => ManagerStatusNormalizer::class,

        \Docker\API\Model\SwarmSpec::class => SwarmSpecNormalizer::class,

        \Docker\API\Model\SwarmSpecOrchestration::class => SwarmSpecOrchestrationNormalizer::class,

        \Docker\API\Model\SwarmSpecRaft::class => SwarmSpecRaftNormalizer::class,

        \Docker\API\Model\SwarmSpecDispatcher::class => SwarmSpecDispatcherNormalizer::class,

        \Docker\API\Model\SwarmSpecCAConfig::class => SwarmSpecCAConfigNormalizer::class,

        \Docker\API\Model\SwarmSpecCAConfigExternalCAsItem::class => SwarmSpecCAConfigExternalCAsItemNormalizer::class,

        \Docker\API\Model\SwarmSpecEncryptionConfig::class => SwarmSpecEncryptionConfigNormalizer::class,

        \Docker\API\Model\SwarmSpecTaskDefaults::class => SwarmSpecTaskDefaultsNormalizer::class,

        \Docker\API\Model\SwarmSpecTaskDefaultsLogDriver::class => SwarmSpecTaskDefaultsLogDriverNormalizer::class,

        \Docker\API\Model\ClusterInfo::class => ClusterInfoNormalizer::class,

        \Docker\API\Model\JoinTokens::class => JoinTokensNormalizer::class,

        \Docker\API\Model\Swarm::class => SwarmNormalizer::class,

        \Docker\API\Model\TaskSpec::class => TaskSpecNormalizer::class,

        \Docker\API\Model\TaskSpecPluginSpec::class => TaskSpecPluginSpecNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpec::class => TaskSpecContainerSpecNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivileges::class => TaskSpecContainerSpecPrivilegesNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec::class => TaskSpecContainerSpecPrivilegesCredentialSpecNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext::class => TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivilegesSeccomp::class => TaskSpecContainerSpecPrivilegesSeccompNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivilegesAppArmor::class => TaskSpecContainerSpecPrivilegesAppArmorNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecDNSConfig::class => TaskSpecContainerSpecDNSConfigNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecSecretsItem::class => TaskSpecContainerSpecSecretsItemNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecSecretsItemFile::class => TaskSpecContainerSpecSecretsItemFileNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecConfigsItem::class => TaskSpecContainerSpecConfigsItemNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecConfigsItemFile::class => TaskSpecContainerSpecConfigsItemFileNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecUlimitsItem::class => TaskSpecContainerSpecUlimitsItemNormalizer::class,

        \Docker\API\Model\TaskSpecNetworkAttachmentSpec::class => TaskSpecNetworkAttachmentSpecNormalizer::class,

        \Docker\API\Model\TaskSpecResources::class => TaskSpecResourcesNormalizer::class,

        \Docker\API\Model\TaskSpecRestartPolicy::class => TaskSpecRestartPolicyNormalizer::class,

        \Docker\API\Model\TaskSpecPlacement::class => TaskSpecPlacementNormalizer::class,

        \Docker\API\Model\TaskSpecPlacementPreferencesItem::class => TaskSpecPlacementPreferencesItemNormalizer::class,

        \Docker\API\Model\TaskSpecPlacementPreferencesItemSpread::class => TaskSpecPlacementPreferencesItemSpreadNormalizer::class,

        \Docker\API\Model\TaskSpecLogDriver::class => TaskSpecLogDriverNormalizer::class,

        \Docker\API\Model\ContainerStatus::class => ContainerStatusNormalizer::class,

        \Docker\API\Model\PortStatus::class => PortStatusNormalizer::class,

        \Docker\API\Model\TaskStatus::class => TaskStatusNormalizer::class,

        \Docker\API\Model\NetworkAttachment::class => NetworkAttachmentNormalizer::class,

        \Docker\API\Model\Task::class => TaskNormalizer::class,

        \Docker\API\Model\ServiceSpec::class => ServiceSpecNormalizer::class,

        \Docker\API\Model\ServiceSpecMode::class => ServiceSpecModeNormalizer::class,

        \Docker\API\Model\ServiceSpecModeReplicated::class => ServiceSpecModeReplicatedNormalizer::class,

        \Docker\API\Model\ServiceSpecModeReplicatedJob::class => ServiceSpecModeReplicatedJobNormalizer::class,

        \Docker\API\Model\ServiceSpecUpdateConfig::class => ServiceSpecUpdateConfigNormalizer::class,

        \Docker\API\Model\ServiceSpecRollbackConfig::class => ServiceSpecRollbackConfigNormalizer::class,

        \Docker\API\Model\EndpointPortConfig::class => EndpointPortConfigNormalizer::class,

        \Docker\API\Model\EndpointSpec::class => EndpointSpecNormalizer::class,

        \Docker\API\Model\Service::class => ServiceNormalizer::class,

        \Docker\API\Model\ServiceEndpoint::class => ServiceEndpointNormalizer::class,

        \Docker\API\Model\ServiceEndpointVirtualIPsItem::class => ServiceEndpointVirtualIPsItemNormalizer::class,

        \Docker\API\Model\ServiceUpdateStatus::class => ServiceUpdateStatusNormalizer::class,

        \Docker\API\Model\ServiceServiceStatus::class => ServiceServiceStatusNormalizer::class,

        \Docker\API\Model\ServiceJobStatus::class => ServiceJobStatusNormalizer::class,

        \Docker\API\Model\ImageDeleteResponseItem::class => ImageDeleteResponseItemNormalizer::class,

        \Docker\API\Model\ServiceCreateResponse::class => ServiceCreateResponseNormalizer::class,

        \Docker\API\Model\ServiceUpdateResponse::class => ServiceUpdateResponseNormalizer::class,

        \Docker\API\Model\ContainerSummary::class => ContainerSummaryNormalizer::class,

        \Docker\API\Model\ContainerSummaryHostConfig::class => ContainerSummaryHostConfigNormalizer::class,

        \Docker\API\Model\ContainerSummaryNetworkSettings::class => ContainerSummaryNetworkSettingsNormalizer::class,

        \Docker\API\Model\Driver::class => DriverNormalizer::class,

        \Docker\API\Model\SecretSpec::class => SecretSpecNormalizer::class,

        \Docker\API\Model\Secret::class => SecretNormalizer::class,

        \Docker\API\Model\ConfigSpec::class => ConfigSpecNormalizer::class,

        \Docker\API\Model\Config::class => ConfigNormalizer::class,

        \Docker\API\Model\ContainerState::class => ContainerStateNormalizer::class,

        \Docker\API\Model\ContainerCreateResponse::class => ContainerCreateResponseNormalizer::class,

        \Docker\API\Model\ContainerWaitResponse::class => ContainerWaitResponseNormalizer::class,

        \Docker\API\Model\ContainerWaitExitError::class => ContainerWaitExitErrorNormalizer::class,

        \Docker\API\Model\SystemVersion::class => SystemVersionNormalizer::class,

        \Docker\API\Model\SystemVersionPlatform::class => SystemVersionPlatformNormalizer::class,

        \Docker\API\Model\SystemVersionComponentsItem::class => SystemVersionComponentsItemNormalizer::class,

        \Docker\API\Model\SystemInfo::class => SystemInfoNormalizer::class,

        \Docker\API\Model\SystemInfoDefaultAddressPoolsItem::class => SystemInfoDefaultAddressPoolsItemNormalizer::class,

        \Docker\API\Model\ContainerdInfo::class => ContainerdInfoNormalizer::class,

        \Docker\API\Model\ContainerdInfoNamespaces::class => ContainerdInfoNamespacesNormalizer::class,

        \Docker\API\Model\PluginsInfo::class => PluginsInfoNormalizer::class,

        \Docker\API\Model\RegistryServiceConfig::class => RegistryServiceConfigNormalizer::class,

        \Docker\API\Model\IndexInfo::class => IndexInfoNormalizer::class,

        \Docker\API\Model\Runtime::class => RuntimeNormalizer::class,

        \Docker\API\Model\Commit::class => CommitNormalizer::class,

        \Docker\API\Model\SwarmInfo::class => SwarmInfoNormalizer::class,

        \Docker\API\Model\PeerNode::class => PeerNodeNormalizer::class,

        \Docker\API\Model\NetworkAttachmentConfig::class => NetworkAttachmentConfigNormalizer::class,

        \Docker\API\Model\EventActor::class => EventActorNormalizer::class,

        \Docker\API\Model\EventMessage::class => EventMessageNormalizer::class,

        \Docker\API\Model\OCIDescriptor::class => OCIDescriptorNormalizer::class,

        \Docker\API\Model\OCIPlatform::class => OCIPlatformNormalizer::class,

        \Docker\API\Model\DistributionInspect::class => DistributionInspectNormalizer::class,

        \Docker\API\Model\ClusterVolume::class => ClusterVolumeNormalizer::class,

        \Docker\API\Model\ClusterVolumeInfo::class => ClusterVolumeInfoNormalizer::class,

        \Docker\API\Model\ClusterVolumePublishStatusItem::class => ClusterVolumePublishStatusItemNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpec::class => ClusterVolumeSpecNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessMode::class => ClusterVolumeSpecAccessModeNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessModeSecretsItem::class => ClusterVolumeSpecAccessModeSecretsItemNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessModeAccessibilityRequirements::class => ClusterVolumeSpecAccessModeAccessibilityRequirementsNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessModeCapacityRange::class => ClusterVolumeSpecAccessModeCapacityRangeNormalizer::class,

        \Docker\API\Model\Topology::class => TopologyNormalizer::class,

        \Docker\API\Model\ImageManifestSummary::class => ImageManifestSummaryNormalizer::class,

        \Docker\API\Model\ImageManifestSummarySize::class => ImageManifestSummarySizeNormalizer::class,

        \Docker\API\Model\ImageManifestSummaryImageData::class => ImageManifestSummaryImageDataNormalizer::class,

        \Docker\API\Model\ImageManifestSummaryImageDataSize::class => ImageManifestSummaryImageDataSizeNormalizer::class,

        \Docker\API\Model\ImageManifestSummaryAttestationData::class => ImageManifestSummaryAttestationDataNormalizer::class,

        \Docker\API\Model\ContainersCreatePostBody::class => ContainersCreatePostBodyNormalizer::class,

        \Docker\API\Model\ContainersIdJsonGetResponse200::class => ContainersIdJsonGetResponse200Normalizer::class,

        \Docker\API\Model\ContainersIdTopGetJsonResponse200::class => ContainersIdTopGetJsonResponse200Normalizer::class,

        \Docker\API\Model\ContainersIdTopGetTextplainResponse200::class => ContainersIdTopGetTextplainResponse200Normalizer::class,

        \Docker\API\Model\ContainersIdUpdatePostBody::class => ContainersIdUpdatePostBodyNormalizer::class,

        \Docker\API\Model\ContainersIdUpdatePostResponse200::class => ContainersIdUpdatePostResponse200Normalizer::class,

        \Docker\API\Model\ContainersPrunePostResponse200::class => ContainersPrunePostResponse200Normalizer::class,

        \Docker\API\Model\BuildPrunePostResponse200::class => BuildPrunePostResponse200Normalizer::class,

        \Docker\API\Model\ImagesSearchGetResponse200Item::class => ImagesSearchGetResponse200ItemNormalizer::class,

        \Docker\API\Model\ImagesPrunePostResponse200::class => ImagesPrunePostResponse200Normalizer::class,

        \Docker\API\Model\AuthPostResponse200::class => AuthPostResponse200Normalizer::class,

        \Docker\API\Model\SystemDfGetJsonResponse200::class => SystemDfGetJsonResponse200Normalizer::class,

        \Docker\API\Model\SystemDfGetTextplainResponse200::class => SystemDfGetTextplainResponse200Normalizer::class,

        \Docker\API\Model\ContainersIdExecPostBody::class => ContainersIdExecPostBodyNormalizer::class,

        \Docker\API\Model\ExecIdStartPostBody::class => ExecIdStartPostBodyNormalizer::class,

        \Docker\API\Model\ExecIdJsonGetResponse200::class => ExecIdJsonGetResponse200Normalizer::class,

        \Docker\API\Model\VolumesNamePutBody::class => VolumesNamePutBodyNormalizer::class,

        \Docker\API\Model\VolumesPrunePostResponse200::class => VolumesPrunePostResponse200Normalizer::class,

        \Docker\API\Model\NetworksCreatePostBody::class => NetworksCreatePostBodyNormalizer::class,

        \Docker\API\Model\NetworksIdConnectPostBody::class => NetworksIdConnectPostBodyNormalizer::class,

        \Docker\API\Model\NetworksIdDisconnectPostBody::class => NetworksIdDisconnectPostBodyNormalizer::class,

        \Docker\API\Model\NetworksPrunePostResponse200::class => NetworksPrunePostResponse200Normalizer::class,

        \Docker\API\Model\SwarmInitPostBody::class => SwarmInitPostBodyNormalizer::class,

        \Docker\API\Model\SwarmJoinPostBody::class => SwarmJoinPostBodyNormalizer::class,

        \Docker\API\Model\SwarmUnlockkeyGetJsonResponse200::class => SwarmUnlockkeyGetJsonResponse200Normalizer::class,

        \Docker\API\Model\SwarmUnlockkeyGetTextplainResponse200::class => SwarmUnlockkeyGetTextplainResponse200Normalizer::class,

        \Docker\API\Model\SwarmUnlockPostBody::class => SwarmUnlockPostBodyNormalizer::class,

        \Docker\API\Model\ServicesCreatePostBody::class => ServicesCreatePostBodyNormalizer::class,

        \Docker\API\Model\ServicesIdUpdatePostBody::class => ServicesIdUpdatePostBodyNormalizer::class,

        \Docker\API\Model\SecretsCreatePostBody::class => SecretsCreatePostBodyNormalizer::class,

        \Docker\API\Model\ConfigsCreatePostBody::class => ConfigsCreatePostBodyNormalizer::class,

        \Jane\Component\JsonSchemaRuntime\Reference::class => \Docker\API\Runtime\Normalizer\ReferenceNormalizer::class,
    ];
    protected $normalizersCache = [];

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \array_key_exists($type, $this->normalizers);
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \array_key_exists($data::class, $this->normalizers);
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $normalizerClass = $this->normalizers[$data::class];
        $normalizer = $this->getNormalizer($normalizerClass);

        return $normalizer->normalize($data, $format, $context);
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $denormalizerClass = $this->normalizers[$type];
        $denormalizer = $this->getNormalizer($denormalizerClass);

        return $denormalizer->denormalize($data, $type, $format, $context);
    }

    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }

    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;

        return $normalizer;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return array_combine(array_keys($this->normalizers), array_fill(0, \count($this->normalizers), false));
    }
}
