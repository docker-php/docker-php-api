<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerInspectResponse implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     *
     * @var string|null
     */
    protected $id;
    /**
     * Date and time at which the container was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string|null
     */
    protected $created;
    /**
     * The path to the command being run.
     *
     * @var string|null
     */
    protected $path;
    /**
     * The arguments to the command being run.
     *
     * @var list<string>|null
     */
    protected $args;
    /**
     * ContainerState stores container's running state. It's part of ContainerJSONBase
     * and will be returned by the "inspect" command.
     *
     * @var ContainerState|null
     */
    protected $state;
    /**
     * The ID (digest) of the image that this container was created from.
     *
     * @var string|null
     */
    protected $image;
    /**
     * Location of the `/etc/resolv.conf` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     *
     * @var string|null
     */
    protected $resolvConfPath;
    /**
     * Location of the `/etc/hostname` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     *
     * @var string|null
     */
    protected $hostnamePath;
    /**
     * Location of the `/etc/hosts` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     *
     * @var string|null
     */
    protected $hostsPath;
    /**
     * Location of the file used to buffer the container's logs. Depending on
     * the logging-driver used for the container, this field may be omitted.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     *
     * @var string|null
     */
    protected $logPath;
    /**
     * The name associated with this container.
     *
     * For historic reasons, the name may be prefixed with a forward-slash (`/`).
     *
     * @var string|null
     */
    protected $name;
    /**
     * Number of times the container was restarted since it was created,
     * or since daemon was started.
     *
     * @var int|null
     */
    protected $restartCount;
    /**
     * The storage-driver used for the container's filesystem (graph-driver
     * or snapshotter).
     *
     * @var string|null
     */
    protected $driver;
    /**
     * The platform (operating system) for which the container was created.
     *
     * This field was introduced for the experimental "LCOW" (Linux Containers
     * On Windows) features, which has been removed. In most cases, this field
     * is equal to the host's operating system (`linux` or `windows`).
     *
     * @var string|null
     */
    protected $platform;
    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor|null
     */
    protected $imageManifestDescriptor;
    /**
     * SELinux mount label set for the container.
     *
     * @var string|null
     */
    protected $mountLabel;
    /**
     * SELinux process label set for the container.
     *
     * @var string|null
     */
    protected $processLabel;
    /**
     * The AppArmor profile set for the container.
     *
     * @var string|null
     */
    protected $appArmorProfile;
    /**
     * IDs of exec instances that are running in the container.
     *
     * @var list<string>|null
     */
    protected $execIDs;
    /**
     * Container configuration that depends on the host we are running on.
     *
     * @var HostConfig|null
     */
    protected $hostConfig;
    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     *
     * @var DriverData|null
     */
    protected $graphDriver;
    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     *
     * @var int|null
     */
    protected $sizeRw;
    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     *
     * @var int|null
     */
    protected $sizeRootFs;
    /**
     * List of mounts used by the container.
     *
     * @var list<MountPoint>|null
     */
    protected $mounts;
    /**
     * Configuration for a container that is portable between hosts.
     *
     * @var ContainerConfig|null
     */
    protected $config;
    /**
     * NetworkSettings exposes the network settings in the API.
     *
     * @var NetworkSettings|null
     */
    protected $networkSettings;

    /**
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Date and time at which the container was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * Date and time at which the container was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * The path to the command being run.
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * The path to the command being run.
     */
    public function setPath(?string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;

        return $this;
    }

    /**
     * The arguments to the command being run.
     *
     * @return list<string>|null
     */
    public function getArgs(): ?array
    {
        return $this->args;
    }

    /**
     * The arguments to the command being run.
     *
     * @param list<string>|null $args
     */
    public function setArgs(?array $args): self
    {
        $this->initialized['args'] = true;
        $this->args = $args;

        return $this;
    }

    /**
     * ContainerState stores container's running state. It's part of ContainerJSONBase
     * and will be returned by the "inspect" command.
     */
    public function getState(): ?ContainerState
    {
        return $this->state;
    }

    /**
     * ContainerState stores container's running state. It's part of ContainerJSONBase
     * and will be returned by the "inspect" command.
     */
    public function setState(?ContainerState $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    /**
     * The ID (digest) of the image that this container was created from.
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * The ID (digest) of the image that this container was created from.
     */
    public function setImage(?string $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;

        return $this;
    }

    /**
     * Location of the `/etc/resolv.conf` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     */
    public function getResolvConfPath(): ?string
    {
        return $this->resolvConfPath;
    }

    /**
     * Location of the `/etc/resolv.conf` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     */
    public function setResolvConfPath(?string $resolvConfPath): self
    {
        $this->initialized['resolvConfPath'] = true;
        $this->resolvConfPath = $resolvConfPath;

        return $this;
    }

    /**
     * Location of the `/etc/hostname` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     */
    public function getHostnamePath(): ?string
    {
        return $this->hostnamePath;
    }

    /**
     * Location of the `/etc/hostname` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     */
    public function setHostnamePath(?string $hostnamePath): self
    {
        $this->initialized['hostnamePath'] = true;
        $this->hostnamePath = $hostnamePath;

        return $this;
    }

    /**
     * Location of the `/etc/hosts` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     */
    public function getHostsPath(): ?string
    {
        return $this->hostsPath;
    }

    /**
     * Location of the `/etc/hosts` generated for the container on the
     * host.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     */
    public function setHostsPath(?string $hostsPath): self
    {
        $this->initialized['hostsPath'] = true;
        $this->hostsPath = $hostsPath;

        return $this;
    }

    /**
     * Location of the file used to buffer the container's logs. Depending on
     * the logging-driver used for the container, this field may be omitted.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     */
    public function getLogPath(): ?string
    {
        return $this->logPath;
    }

    /**
     * Location of the file used to buffer the container's logs. Depending on
     * the logging-driver used for the container, this field may be omitted.
     *
     * This file is managed through the docker daemon, and should not be
     * accessed or modified by other tools.
     */
    public function setLogPath(?string $logPath): self
    {
        $this->initialized['logPath'] = true;
        $this->logPath = $logPath;

        return $this;
    }

    /**
     * The name associated with this container.
     *
     * For historic reasons, the name may be prefixed with a forward-slash (`/`).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * The name associated with this container.
     *
     * For historic reasons, the name may be prefixed with a forward-slash (`/`).
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Number of times the container was restarted since it was created,
     * or since daemon was started.
     */
    public function getRestartCount(): ?int
    {
        return $this->restartCount;
    }

    /**
     * Number of times the container was restarted since it was created,
     * or since daemon was started.
     */
    public function setRestartCount(?int $restartCount): self
    {
        $this->initialized['restartCount'] = true;
        $this->restartCount = $restartCount;

        return $this;
    }

    /**
     * The storage-driver used for the container's filesystem (graph-driver
     * or snapshotter).
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * The storage-driver used for the container's filesystem (graph-driver
     * or snapshotter).
     */
    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * The platform (operating system) for which the container was created.
     *
     * This field was introduced for the experimental "LCOW" (Linux Containers
     * On Windows) features, which has been removed. In most cases, this field
     * is equal to the host's operating system (`linux` or `windows`).
     */
    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    /**
     * The platform (operating system) for which the container was created.
     *
     * This field was introduced for the experimental "LCOW" (Linux Containers
     * On Windows) features, which has been removed. In most cases, this field
     * is equal to the host's operating system (`linux` or `windows`).
     */
    public function setPlatform(?string $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;

        return $this;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function getImageManifestDescriptor(): ?OCIDescriptor
    {
        return $this->imageManifestDescriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function setImageManifestDescriptor(?OCIDescriptor $imageManifestDescriptor): self
    {
        $this->initialized['imageManifestDescriptor'] = true;
        $this->imageManifestDescriptor = $imageManifestDescriptor;

        return $this;
    }

    /**
     * SELinux mount label set for the container.
     */
    public function getMountLabel(): ?string
    {
        return $this->mountLabel;
    }

    /**
     * SELinux mount label set for the container.
     */
    public function setMountLabel(?string $mountLabel): self
    {
        $this->initialized['mountLabel'] = true;
        $this->mountLabel = $mountLabel;

        return $this;
    }

    /**
     * SELinux process label set for the container.
     */
    public function getProcessLabel(): ?string
    {
        return $this->processLabel;
    }

    /**
     * SELinux process label set for the container.
     */
    public function setProcessLabel(?string $processLabel): self
    {
        $this->initialized['processLabel'] = true;
        $this->processLabel = $processLabel;

        return $this;
    }

    /**
     * The AppArmor profile set for the container.
     */
    public function getAppArmorProfile(): ?string
    {
        return $this->appArmorProfile;
    }

    /**
     * The AppArmor profile set for the container.
     */
    public function setAppArmorProfile(?string $appArmorProfile): self
    {
        $this->initialized['appArmorProfile'] = true;
        $this->appArmorProfile = $appArmorProfile;

        return $this;
    }

    /**
     * IDs of exec instances that are running in the container.
     *
     * @return list<string>|null
     */
    public function getExecIDs(): ?array
    {
        return $this->execIDs;
    }

    /**
     * IDs of exec instances that are running in the container.
     *
     * @param list<string>|null $execIDs
     */
    public function setExecIDs(?array $execIDs): self
    {
        $this->initialized['execIDs'] = true;
        $this->execIDs = $execIDs;

        return $this;
    }

    /**
     * Container configuration that depends on the host we are running on.
     */
    public function getHostConfig(): ?HostConfig
    {
        return $this->hostConfig;
    }

    /**
     * Container configuration that depends on the host we are running on.
     */
    public function setHostConfig(?HostConfig $hostConfig): self
    {
        $this->initialized['hostConfig'] = true;
        $this->hostConfig = $hostConfig;

        return $this;
    }

    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     */
    public function getGraphDriver(): ?DriverData
    {
        return $this->graphDriver;
    }

    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     */
    public function setGraphDriver(?DriverData $graphDriver): self
    {
        $this->initialized['graphDriver'] = true;
        $this->graphDriver = $graphDriver;

        return $this;
    }

    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function getSizeRw(): ?int
    {
        return $this->sizeRw;
    }

    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function setSizeRw(?int $sizeRw): self
    {
        $this->initialized['sizeRw'] = true;
        $this->sizeRw = $sizeRw;

        return $this;
    }

    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function getSizeRootFs(): ?int
    {
        return $this->sizeRootFs;
    }

    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function setSizeRootFs(?int $sizeRootFs): self
    {
        $this->initialized['sizeRootFs'] = true;
        $this->sizeRootFs = $sizeRootFs;

        return $this;
    }

    /**
     * List of mounts used by the container.
     *
     * @return list<MountPoint>|null
     */
    public function getMounts(): ?array
    {
        return $this->mounts;
    }

    /**
     * List of mounts used by the container.
     *
     * @param list<MountPoint>|null $mounts
     */
    public function setMounts(?array $mounts): self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;

        return $this;
    }

    /**
     * Configuration for a container that is portable between hosts.
     */
    public function getConfig(): ?ContainerConfig
    {
        return $this->config;
    }

    /**
     * Configuration for a container that is portable between hosts.
     */
    public function setConfig(?ContainerConfig $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    /**
     * NetworkSettings exposes the network settings in the API.
     */
    public function getNetworkSettings(): ?NetworkSettings
    {
        return $this->networkSettings;
    }

    /**
     * NetworkSettings exposes the network settings in the API.
     */
    public function setNetworkSettings(?NetworkSettings $networkSettings): self
    {
        $this->initialized['networkSettings'] = true;
        $this->networkSettings = $networkSettings;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['Id', 'getId', 'setId'], 'created' => ['Created', 'getCreated', 'setCreated'], 'path' => ['Path', 'getPath', 'setPath'], 'args' => ['Args', 'getArgs', 'setArgs'], 'state' => ['State', 'getState', 'setState'], 'image' => ['Image', 'getImage', 'setImage'], 'resolvConfPath' => ['ResolvConfPath', 'getResolvConfPath', 'setResolvConfPath'], 'hostnamePath' => ['HostnamePath', 'getHostnamePath', 'setHostnamePath'], 'hostsPath' => ['HostsPath', 'getHostsPath', 'setHostsPath'], 'logPath' => ['LogPath', 'getLogPath', 'setLogPath'], 'name' => ['Name', 'getName', 'setName'], 'restartCount' => ['RestartCount', 'getRestartCount', 'setRestartCount'], 'driver' => ['Driver', 'getDriver', 'setDriver'], 'platform' => ['Platform', 'getPlatform', 'setPlatform'], 'imageManifestDescriptor' => ['ImageManifestDescriptor', 'getImageManifestDescriptor', 'setImageManifestDescriptor'], 'mountLabel' => ['MountLabel', 'getMountLabel', 'setMountLabel'], 'processLabel' => ['ProcessLabel', 'getProcessLabel', 'setProcessLabel'], 'appArmorProfile' => ['AppArmorProfile', 'getAppArmorProfile', 'setAppArmorProfile'], 'execIDs' => ['ExecIDs', 'getExecIDs', 'setExecIDs'], 'hostConfig' => ['HostConfig', 'getHostConfig', 'setHostConfig'], 'graphDriver' => ['GraphDriver', 'getGraphDriver', 'setGraphDriver'], 'sizeRw' => ['SizeRw', 'getSizeRw', 'setSizeRw'], 'sizeRootFs' => ['SizeRootFs', 'getSizeRootFs', 'setSizeRootFs'], 'mounts' => ['Mounts', 'getMounts', 'setMounts'], 'config' => ['Config', 'getConfig', 'setConfig'], 'networkSettings' => ['NetworkSettings', 'getNetworkSettings', 'setNetworkSettings']];
    }
}
