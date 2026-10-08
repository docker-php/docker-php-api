<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerCPUUsage implements AdditionalPropertiesInterface
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
     * Total CPU time consumed in nanoseconds (Linux) or 100's of nanoseconds (Windows).
     *
     * @var int|null
     */
    protected $totalUsage;
    /**
     * Total CPU time (in nanoseconds) consumed per core (Linux).
     *
     * This field is Linux-specific when using cgroups v1. It is omitted
     * when using cgroups v2 and Windows containers.
     *
     * @var list<int>|null
     */
    protected $percpuUsage;
    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in kernel mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     *
     * @var int|null
     */
    protected $usageInKernelmode;
    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in user mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     *
     * @var int|null
     */
    protected $usageInUsermode;

    /**
     * Total CPU time consumed in nanoseconds (Linux) or 100's of nanoseconds (Windows).
     */
    public function getTotalUsage(): ?int
    {
        return $this->totalUsage;
    }

    /**
     * Total CPU time consumed in nanoseconds (Linux) or 100's of nanoseconds (Windows).
     */
    public function setTotalUsage(?int $totalUsage): self
    {
        $this->initialized['totalUsage'] = true;
        $this->totalUsage = $totalUsage;

        return $this;
    }

    /**
     * Total CPU time (in nanoseconds) consumed per core (Linux).
     *
     * This field is Linux-specific when using cgroups v1. It is omitted
     * when using cgroups v2 and Windows containers.
     *
     * @return list<int>|null
     */
    public function getPercpuUsage(): ?array
    {
        return $this->percpuUsage;
    }

    /**
     * Total CPU time (in nanoseconds) consumed per core (Linux).
     *
     * This field is Linux-specific when using cgroups v1. It is omitted
     * when using cgroups v2 and Windows containers.
     *
     * @param list<int>|null $percpuUsage
     */
    public function setPercpuUsage(?array $percpuUsage): self
    {
        $this->initialized['percpuUsage'] = true;
        $this->percpuUsage = $percpuUsage;

        return $this;
    }

    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in kernel mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     */
    public function getUsageInKernelmode(): ?int
    {
        return $this->usageInKernelmode;
    }

    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in kernel mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     */
    public function setUsageInKernelmode(?int $usageInKernelmode): self
    {
        $this->initialized['usageInKernelmode'] = true;
        $this->usageInKernelmode = $usageInKernelmode;

        return $this;
    }

    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in user mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     */
    public function getUsageInUsermode(): ?int
    {
        return $this->usageInUsermode;
    }

    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in user mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     */
    public function setUsageInUsermode(?int $usageInUsermode): self
    {
        $this->initialized['usageInUsermode'] = true;
        $this->usageInUsermode = $usageInUsermode;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['totalUsage' => ['total_usage', 'getTotalUsage', 'setTotalUsage'], 'percpuUsage' => ['percpu_usage', 'getPercpuUsage', 'setPercpuUsage'], 'usageInKernelmode' => ['usage_in_kernelmode', 'getUsageInKernelmode', 'setUsageInKernelmode'], 'usageInUsermode' => ['usage_in_usermode', 'getUsageInUsermode', 'setUsageInUsermode']];
    }
}
