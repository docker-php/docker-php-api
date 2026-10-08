<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerStatsResponse implements AdditionalPropertiesInterface
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
     * Name of the container.
     *
     * @var string|null
     */
    protected $name;
    /**
     * ID of the container.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Date and time at which this sample was collected.
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     *
     * @var \DateTimeInterface|null
     */
    protected $read;
    /**
     * Date and time at which this first sample was collected. This field
     * is not propagated if the "one-shot" option is set. If the "one-shot"
     * option is set, this field may be omitted, empty, or set to a default
     * date (`0001-01-01T00:00:00Z`).
     *
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     *
     * @var \DateTimeInterface|null
     */
    protected $preread;
    /**
     * PidsStats contains Linux-specific stats of a container's process-IDs (PIDs).
     *
     * This type is Linux-specific and omitted for Windows containers.
     *
     * @var ContainerPidsStats|null
     */
    protected $pidsStats;
    /**
     * BlkioStats stores all IO service stats for data read and write.
     *
     * This type is Linux-specific and holds many fields that are specific to cgroups v1.
     * On a cgroup v2 host, all fields other than `io_service_bytes_recursive`
     * are omitted or `null`.
     *
     * This type is only populated on Linux and omitted for Windows containers.
     *
     * @var ContainerBlkioStats|null
     */
    protected $blkioStats;
    /**
     * The number of processors on the system.
     *
     * This field is Windows-specific and always zero for Linux containers.
     *
     * @var int|null
     */
    protected $numProcs;
    /**
     * StorageStats is the disk I/O stats for read/write on Windows.
     *
     * This type is Windows-specific and omitted for Linux containers.
     *
     * @var ContainerStorageStats|null
     */
    protected $storageStats;
    /**
     * CPU related info of the container.
     *
     * @var ContainerCPUStats|null
     */
    protected $cpuStats;
    /**
     * CPU related info of the container.
     *
     * @var ContainerCPUStats|null
     */
    protected $precpuStats;
    /**
     * Aggregates all memory stats since container inception on Linux.
     * Windows returns stats for commit and private working set only.
     *
     * @var ContainerMemoryStats|null
     */
    protected $memoryStats;
    /**
     * Network statistics for the container per interface.
     *
     * This field is omitted if the container has no networking enabled.
     *
     * @var mixed|null
     */
    protected $networks;

    /**
     * Name of the container.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the container.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * ID of the container.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * ID of the container.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Date and time at which this sample was collected.
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     */
    public function getRead(): ?\DateTimeInterface
    {
        return $this->read;
    }

    /**
     * Date and time at which this sample was collected.
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     */
    public function setRead(?\DateTimeInterface $read): self
    {
        $this->initialized['read'] = true;
        $this->read = $read;

        return $this;
    }

    /**
     * Date and time at which this first sample was collected. This field
     * is not propagated if the "one-shot" option is set. If the "one-shot"
     * option is set, this field may be omitted, empty, or set to a default
     * date (`0001-01-01T00:00:00Z`).
     *
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     */
    public function getPreread(): ?\DateTimeInterface
    {
        return $this->preread;
    }

    /**
     * Date and time at which this first sample was collected. This field
     * is not propagated if the "one-shot" option is set. If the "one-shot"
     * option is set, this field may be omitted, empty, or set to a default
     * date (`0001-01-01T00:00:00Z`).
     *
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     */
    public function setPreread(?\DateTimeInterface $preread): self
    {
        $this->initialized['preread'] = true;
        $this->preread = $preread;

        return $this;
    }

    /**
     * PidsStats contains Linux-specific stats of a container's process-IDs (PIDs).
     *
     * This type is Linux-specific and omitted for Windows containers.
     */
    public function getPidsStats(): ?ContainerPidsStats
    {
        return $this->pidsStats;
    }

    /**
     * PidsStats contains Linux-specific stats of a container's process-IDs (PIDs).
     *
     * This type is Linux-specific and omitted for Windows containers.
     */
    public function setPidsStats(?ContainerPidsStats $pidsStats): self
    {
        $this->initialized['pidsStats'] = true;
        $this->pidsStats = $pidsStats;

        return $this;
    }

    /**
     * BlkioStats stores all IO service stats for data read and write.
     *
     * This type is Linux-specific and holds many fields that are specific to cgroups v1.
     * On a cgroup v2 host, all fields other than `io_service_bytes_recursive`
     * are omitted or `null`.
     *
     * This type is only populated on Linux and omitted for Windows containers.
     */
    public function getBlkioStats(): ?ContainerBlkioStats
    {
        return $this->blkioStats;
    }

    /**
     * BlkioStats stores all IO service stats for data read and write.
     *
     * This type is Linux-specific and holds many fields that are specific to cgroups v1.
     * On a cgroup v2 host, all fields other than `io_service_bytes_recursive`
     * are omitted or `null`.
     *
     * This type is only populated on Linux and omitted for Windows containers.
     */
    public function setBlkioStats(?ContainerBlkioStats $blkioStats): self
    {
        $this->initialized['blkioStats'] = true;
        $this->blkioStats = $blkioStats;

        return $this;
    }

    /**
     * The number of processors on the system.
     *
     * This field is Windows-specific and always zero for Linux containers.
     */
    public function getNumProcs(): ?int
    {
        return $this->numProcs;
    }

    /**
     * The number of processors on the system.
     *
     * This field is Windows-specific and always zero for Linux containers.
     */
    public function setNumProcs(?int $numProcs): self
    {
        $this->initialized['numProcs'] = true;
        $this->numProcs = $numProcs;

        return $this;
    }

    /**
     * StorageStats is the disk I/O stats for read/write on Windows.
     *
     * This type is Windows-specific and omitted for Linux containers.
     */
    public function getStorageStats(): ?ContainerStorageStats
    {
        return $this->storageStats;
    }

    /**
     * StorageStats is the disk I/O stats for read/write on Windows.
     *
     * This type is Windows-specific and omitted for Linux containers.
     */
    public function setStorageStats(?ContainerStorageStats $storageStats): self
    {
        $this->initialized['storageStats'] = true;
        $this->storageStats = $storageStats;

        return $this;
    }

    /**
     * CPU related info of the container.
     */
    public function getCpuStats(): ?ContainerCPUStats
    {
        return $this->cpuStats;
    }

    /**
     * CPU related info of the container.
     */
    public function setCpuStats(?ContainerCPUStats $cpuStats): self
    {
        $this->initialized['cpuStats'] = true;
        $this->cpuStats = $cpuStats;

        return $this;
    }

    /**
     * CPU related info of the container.
     */
    public function getPrecpuStats(): ?ContainerCPUStats
    {
        return $this->precpuStats;
    }

    /**
     * CPU related info of the container.
     */
    public function setPrecpuStats(?ContainerCPUStats $precpuStats): self
    {
        $this->initialized['precpuStats'] = true;
        $this->precpuStats = $precpuStats;

        return $this;
    }

    /**
     * Aggregates all memory stats since container inception on Linux.
     * Windows returns stats for commit and private working set only.
     */
    public function getMemoryStats(): ?ContainerMemoryStats
    {
        return $this->memoryStats;
    }

    /**
     * Aggregates all memory stats since container inception on Linux.
     * Windows returns stats for commit and private working set only.
     */
    public function setMemoryStats(?ContainerMemoryStats $memoryStats): self
    {
        $this->initialized['memoryStats'] = true;
        $this->memoryStats = $memoryStats;

        return $this;
    }

    /**
     * Network statistics for the container per interface.
     *
     * This field is omitted if the container has no networking enabled.
     */
    public function getNetworks()
    {
        return $this->networks;
    }

    /**
     * Network statistics for the container per interface.
     *
     * This field is omitted if the container has no networking enabled.
     */
    public function setNetworks($networks): self
    {
        $this->initialized['networks'] = true;
        $this->networks = $networks;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['name', 'getName', 'setName'], 'id' => ['id', 'getId', 'setId'], 'read' => ['read', 'getRead', 'setRead'], 'preread' => ['preread', 'getPreread', 'setPreread'], 'pidsStats' => ['pids_stats', 'getPidsStats', 'setPidsStats'], 'blkioStats' => ['blkio_stats', 'getBlkioStats', 'setBlkioStats'], 'numProcs' => ['num_procs', 'getNumProcs', 'setNumProcs'], 'storageStats' => ['storage_stats', 'getStorageStats', 'setStorageStats'], 'cpuStats' => ['cpu_stats', 'getCpuStats', 'setCpuStats'], 'precpuStats' => ['precpu_stats', 'getPrecpuStats', 'setPrecpuStats'], 'memoryStats' => ['memory_stats', 'getMemoryStats', 'setMemoryStats'], 'networks' => ['networks', 'getNetworks', 'setNetworks']];
    }
}
