<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerPidsStats implements AdditionalPropertiesInterface
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
     * Current is the number of PIDs in the cgroup.
     *
     * @var int|null
     */
    protected $current;
    /**
     * Limit is the hard limit on the number of pids in the cgroup.
     * A "Limit" of 0 means that there is no limit.
     *
     * @var int|null
     */
    protected $limit;

    /**
     * Current is the number of PIDs in the cgroup.
     */
    public function getCurrent(): ?int
    {
        return $this->current;
    }

    /**
     * Current is the number of PIDs in the cgroup.
     */
    public function setCurrent(?int $current): self
    {
        $this->initialized['current'] = true;
        $this->current = $current;

        return $this;
    }

    /**
     * Limit is the hard limit on the number of pids in the cgroup.
     * A "Limit" of 0 means that there is no limit.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Limit is the hard limit on the number of pids in the cgroup.
     * A "Limit" of 0 means that there is no limit.
     */
    public function setLimit(?int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['current' => ['current', 'getCurrent', 'setCurrent'], 'limit' => ['limit', 'getLimit', 'setLimit']];
    }
}
