<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainersIdJsonGetResponse200 implements AdditionalPropertiesInterface
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
     * The ID of the container.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The time the container was created.
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
     * The container's image ID.
     *
     * @var string|null
     */
    protected $image;
    /**
     * @var string|null
     */
    protected $resolvConfPath;
    /**
     * @var string|null
     */
    protected $hostnamePath;
    /**
     * @var string|null
     */
    protected $hostsPath;
    /**
     * @var string|null
     */
    protected $logPath;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var int|null
     */
    protected $restartCount;
    /**
     * @var string|null
     */
    protected $driver;
    /**
     * @var string|null
     */
    protected $platform;
    /**
     * @var string|null
     */
    protected $mountLabel;
    /**
     * @var string|null
     */
    protected $processLabel;
    /**
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
     * The size of files that have been created or changed by this
     * container.
     *
     * @var int|null
     */
    protected $sizeRw;
    /**
     * The total size of all the files in this container.
     *
     * @var int|null
     */
    protected $sizeRootFs;
    /**
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
     * The ID of the container.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID of the container.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The time the container was created.
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * The time the container was created.
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
     * The container's image ID.
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * The container's image ID.
     */
    public function setImage(?string $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;

        return $this;
    }

    public function getResolvConfPath(): ?string
    {
        return $this->resolvConfPath;
    }

    public function setResolvConfPath(?string $resolvConfPath): self
    {
        $this->initialized['resolvConfPath'] = true;
        $this->resolvConfPath = $resolvConfPath;

        return $this;
    }

    public function getHostnamePath(): ?string
    {
        return $this->hostnamePath;
    }

    public function setHostnamePath(?string $hostnamePath): self
    {
        $this->initialized['hostnamePath'] = true;
        $this->hostnamePath = $hostnamePath;

        return $this;
    }

    public function getHostsPath(): ?string
    {
        return $this->hostsPath;
    }

    public function setHostsPath(?string $hostsPath): self
    {
        $this->initialized['hostsPath'] = true;
        $this->hostsPath = $hostsPath;

        return $this;
    }

    public function getLogPath(): ?string
    {
        return $this->logPath;
    }

    public function setLogPath(?string $logPath): self
    {
        $this->initialized['logPath'] = true;
        $this->logPath = $logPath;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getRestartCount(): ?int
    {
        return $this->restartCount;
    }

    public function setRestartCount(?int $restartCount): self
    {
        $this->initialized['restartCount'] = true;
        $this->restartCount = $restartCount;

        return $this;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(?string $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;

        return $this;
    }

    public function getMountLabel(): ?string
    {
        return $this->mountLabel;
    }

    public function setMountLabel(?string $mountLabel): self
    {
        $this->initialized['mountLabel'] = true;
        $this->mountLabel = $mountLabel;

        return $this;
    }

    public function getProcessLabel(): ?string
    {
        return $this->processLabel;
    }

    public function setProcessLabel(?string $processLabel): self
    {
        $this->initialized['processLabel'] = true;
        $this->processLabel = $processLabel;

        return $this;
    }

    public function getAppArmorProfile(): ?string
    {
        return $this->appArmorProfile;
    }

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
     * The size of files that have been created or changed by this
     * container.
     */
    public function getSizeRw(): ?int
    {
        return $this->sizeRw;
    }

    /**
     * The size of files that have been created or changed by this
     * container.
     */
    public function setSizeRw(?int $sizeRw): self
    {
        $this->initialized['sizeRw'] = true;
        $this->sizeRw = $sizeRw;

        return $this;
    }

    /**
     * The total size of all the files in this container.
     */
    public function getSizeRootFs(): ?int
    {
        return $this->sizeRootFs;
    }

    /**
     * The total size of all the files in this container.
     */
    public function setSizeRootFs(?int $sizeRootFs): self
    {
        $this->initialized['sizeRootFs'] = true;
        $this->sizeRootFs = $sizeRootFs;

        return $this;
    }

    /**
     * @return list<MountPoint>|null
     */
    public function getMounts(): ?array
    {
        return $this->mounts;
    }

    /**
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
        return ['id' => ['Id', 'getId', 'setId'], 'created' => ['Created', 'getCreated', 'setCreated'], 'path' => ['Path', 'getPath', 'setPath'], 'args' => ['Args', 'getArgs', 'setArgs'], 'state' => ['State', 'getState', 'setState'], 'image' => ['Image', 'getImage', 'setImage'], 'resolvConfPath' => ['ResolvConfPath', 'getResolvConfPath', 'setResolvConfPath'], 'hostnamePath' => ['HostnamePath', 'getHostnamePath', 'setHostnamePath'], 'hostsPath' => ['HostsPath', 'getHostsPath', 'setHostsPath'], 'logPath' => ['LogPath', 'getLogPath', 'setLogPath'], 'name' => ['Name', 'getName', 'setName'], 'restartCount' => ['RestartCount', 'getRestartCount', 'setRestartCount'], 'driver' => ['Driver', 'getDriver', 'setDriver'], 'platform' => ['Platform', 'getPlatform', 'setPlatform'], 'mountLabel' => ['MountLabel', 'getMountLabel', 'setMountLabel'], 'processLabel' => ['ProcessLabel', 'getProcessLabel', 'setProcessLabel'], 'appArmorProfile' => ['AppArmorProfile', 'getAppArmorProfile', 'setAppArmorProfile'], 'execIDs' => ['ExecIDs', 'getExecIDs', 'setExecIDs'], 'hostConfig' => ['HostConfig', 'getHostConfig', 'setHostConfig'], 'graphDriver' => ['GraphDriver', 'getGraphDriver', 'setGraphDriver'], 'sizeRw' => ['SizeRw', 'getSizeRw', 'setSizeRw'], 'sizeRootFs' => ['SizeRootFs', 'getSizeRootFs', 'setSizeRootFs'], 'mounts' => ['Mounts', 'getMounts', 'setMounts'], 'config' => ['Config', 'getConfig', 'setConfig'], 'networkSettings' => ['NetworkSettings', 'getNetworkSettings', 'setNetworkSettings']];
    }
}
