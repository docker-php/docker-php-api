<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerMemoryStats implements AdditionalPropertiesInterface
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
     * Current `res_counter` usage for memory.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var int|null
     */
    protected $usage;
    /**
     * Maximum usage ever recorded.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     *
     * @var int|null
     */
    protected $maxUsage;
    /**
     * All the stats exported via memory.stat.
     *
     * The fields in this object differ between cgroups v1 and v2.
     * On cgroups v1, fields such as `cache`, `rss`, `mapped_file` are available.
     * On cgroups v2, fields such as `file`, `anon`, `inactive_file` are available.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var array<string, int>|null
     */
    protected $stats;
    /**
     * Number of times memory usage hits limits.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     *
     * @var int|null
     */
    protected $failcnt;
    /**
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var int|null
     */
    protected $limit;
    /**
     * Committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var int|null
     */
    protected $commitbytes;
    /**
     * Peak committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var int|null
     */
    protected $commitpeakbytes;
    /**
     * Private working set.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var int|null
     */
    protected $privateworkingset;

    /**
     * Current `res_counter` usage for memory.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function getUsage(): ?int
    {
        return $this->usage;
    }

    /**
     * Current `res_counter` usage for memory.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function setUsage(?int $usage): self
    {
        $this->initialized['usage'] = true;
        $this->usage = $usage;

        return $this;
    }

    /**
     * Maximum usage ever recorded.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     */
    public function getMaxUsage(): ?int
    {
        return $this->maxUsage;
    }

    /**
     * Maximum usage ever recorded.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     */
    public function setMaxUsage(?int $maxUsage): self
    {
        $this->initialized['maxUsage'] = true;
        $this->maxUsage = $maxUsage;

        return $this;
    }

    /**
     * All the stats exported via memory.stat.
     *
     * The fields in this object differ between cgroups v1 and v2.
     * On cgroups v1, fields such as `cache`, `rss`, `mapped_file` are available.
     * On cgroups v2, fields such as `file`, `anon`, `inactive_file` are available.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @return array<string, int>|null
     */
    public function getStats(): ?iterable
    {
        return $this->stats;
    }

    /**
     * All the stats exported via memory.stat.
     *
     * The fields in this object differ between cgroups v1 and v2.
     * On cgroups v1, fields such as `cache`, `rss`, `mapped_file` are available.
     * On cgroups v2, fields such as `file`, `anon`, `inactive_file` are available.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @param array<string, int>|null $stats
     */
    public function setStats(?iterable $stats): self
    {
        $this->initialized['stats'] = true;
        $this->stats = $stats;

        return $this;
    }

    /**
     * Number of times memory usage hits limits.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     */
    public function getFailcnt(): ?int
    {
        return $this->failcnt;
    }

    /**
     * Number of times memory usage hits limits.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     */
    public function setFailcnt(?int $failcnt): self
    {
        $this->initialized['failcnt'] = true;
        $this->failcnt = $failcnt;

        return $this;
    }

    /**
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function setLimit(?int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;

        return $this;
    }

    /**
     * Committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getCommitbytes(): ?int
    {
        return $this->commitbytes;
    }

    /**
     * Committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setCommitbytes(?int $commitbytes): self
    {
        $this->initialized['commitbytes'] = true;
        $this->commitbytes = $commitbytes;

        return $this;
    }

    /**
     * Peak committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getCommitpeakbytes(): ?int
    {
        return $this->commitpeakbytes;
    }

    /**
     * Peak committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setCommitpeakbytes(?int $commitpeakbytes): self
    {
        $this->initialized['commitpeakbytes'] = true;
        $this->commitpeakbytes = $commitpeakbytes;

        return $this;
    }

    /**
     * Private working set.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getPrivateworkingset(): ?int
    {
        return $this->privateworkingset;
    }

    /**
     * Private working set.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setPrivateworkingset(?int $privateworkingset): self
    {
        $this->initialized['privateworkingset'] = true;
        $this->privateworkingset = $privateworkingset;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['usage' => ['usage', 'getUsage', 'setUsage'], 'maxUsage' => ['max_usage', 'getMaxUsage', 'setMaxUsage'], 'stats' => ['stats', 'getStats', 'setStats'], 'failcnt' => ['failcnt', 'getFailcnt', 'setFailcnt'], 'limit' => ['limit', 'getLimit', 'setLimit'], 'commitbytes' => ['commitbytes', 'getCommitbytes', 'setCommitbytes'], 'commitpeakbytes' => ['commitpeakbytes', 'getCommitpeakbytes', 'setCommitpeakbytes'], 'privateworkingset' => ['privateworkingset', 'getPrivateworkingset', 'setPrivateworkingset']];
    }
}
