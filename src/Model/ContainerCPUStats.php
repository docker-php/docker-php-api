<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerCPUStats implements AdditionalPropertiesInterface
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
     * All CPU stats aggregated since container inception.
     *
     * @var ContainerCPUUsage|null
     */
    protected $cpuUsage;
    /**
     * System Usage.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var int|null
     */
    protected $systemCpuUsage;
    /**
     * Number of online CPUs.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var int|null
     */
    protected $onlineCpus;
    /**
     * CPU throttling stats of the container.
     *
     * This type is Linux-specific and omitted for Windows containers.
     *
     * @var ContainerThrottlingData|null
     */
    protected $throttlingData;

    /**
     * All CPU stats aggregated since container inception.
     */
    public function getCpuUsage(): ?ContainerCPUUsage
    {
        return $this->cpuUsage;
    }

    /**
     * All CPU stats aggregated since container inception.
     */
    public function setCpuUsage(?ContainerCPUUsage $cpuUsage): self
    {
        $this->initialized['cpuUsage'] = true;
        $this->cpuUsage = $cpuUsage;

        return $this;
    }

    /**
     * System Usage.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function getSystemCpuUsage(): ?int
    {
        return $this->systemCpuUsage;
    }

    /**
     * System Usage.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function setSystemCpuUsage(?int $systemCpuUsage): self
    {
        $this->initialized['systemCpuUsage'] = true;
        $this->systemCpuUsage = $systemCpuUsage;

        return $this;
    }

    /**
     * Number of online CPUs.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function getOnlineCpus(): ?int
    {
        return $this->onlineCpus;
    }

    /**
     * Number of online CPUs.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function setOnlineCpus(?int $onlineCpus): self
    {
        $this->initialized['onlineCpus'] = true;
        $this->onlineCpus = $onlineCpus;

        return $this;
    }

    /**
     * CPU throttling stats of the container.
     *
     * This type is Linux-specific and omitted for Windows containers.
     */
    public function getThrottlingData(): ?ContainerThrottlingData
    {
        return $this->throttlingData;
    }

    /**
     * CPU throttling stats of the container.
     *
     * This type is Linux-specific and omitted for Windows containers.
     */
    public function setThrottlingData(?ContainerThrottlingData $throttlingData): self
    {
        $this->initialized['throttlingData'] = true;
        $this->throttlingData = $throttlingData;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['cpuUsage' => ['cpu_usage', 'getCpuUsage', 'setCpuUsage'], 'systemCpuUsage' => ['system_cpu_usage', 'getSystemCpuUsage', 'setSystemCpuUsage'], 'onlineCpus' => ['online_cpus', 'getOnlineCpus', 'setOnlineCpus'], 'throttlingData' => ['throttling_data', 'getThrottlingData', 'setThrottlingData']];
    }
}
