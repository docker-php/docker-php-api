<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerThrottlingData implements AdditionalPropertiesInterface
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
     * Number of periods with throttling active.
     *
     * @var int|null
     */
    protected $periods;
    /**
     * Number of periods when the container hit its throttling limit.
     *
     * @var int|null
     */
    protected $throttledPeriods;
    /**
     * Aggregated time (in nanoseconds) the container was throttled for.
     *
     * @var int|null
     */
    protected $throttledTime;

    /**
     * Number of periods with throttling active.
     */
    public function getPeriods(): ?int
    {
        return $this->periods;
    }

    /**
     * Number of periods with throttling active.
     */
    public function setPeriods(?int $periods): self
    {
        $this->initialized['periods'] = true;
        $this->periods = $periods;

        return $this;
    }

    /**
     * Number of periods when the container hit its throttling limit.
     */
    public function getThrottledPeriods(): ?int
    {
        return $this->throttledPeriods;
    }

    /**
     * Number of periods when the container hit its throttling limit.
     */
    public function setThrottledPeriods(?int $throttledPeriods): self
    {
        $this->initialized['throttledPeriods'] = true;
        $this->throttledPeriods = $throttledPeriods;

        return $this;
    }

    /**
     * Aggregated time (in nanoseconds) the container was throttled for.
     */
    public function getThrottledTime(): ?int
    {
        return $this->throttledTime;
    }

    /**
     * Aggregated time (in nanoseconds) the container was throttled for.
     */
    public function setThrottledTime(?int $throttledTime): self
    {
        $this->initialized['throttledTime'] = true;
        $this->throttledTime = $throttledTime;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['periods' => ['periods', 'getPeriods', 'setPeriods'], 'throttledPeriods' => ['throttled_periods', 'getThrottledPeriods', 'setThrottledPeriods'], 'throttledTime' => ['throttled_time', 'getThrottledTime', 'setThrottledTime']];
    }
}
