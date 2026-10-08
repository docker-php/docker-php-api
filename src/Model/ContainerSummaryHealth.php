<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerSummaryHealth implements AdditionalPropertiesInterface
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
     * the health status of the container.
     *
     * @var string|null
     */
    protected $status;
    /**
     * FailingStreak is the number of consecutive failures.
     *
     * @var int|null
     */
    protected $failingStreak;

    /**
     * the health status of the container.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * the health status of the container.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * FailingStreak is the number of consecutive failures.
     */
    public function getFailingStreak(): ?int
    {
        return $this->failingStreak;
    }

    /**
     * FailingStreak is the number of consecutive failures.
     */
    public function setFailingStreak(?int $failingStreak): self
    {
        $this->initialized['failingStreak'] = true;
        $this->failingStreak = $failingStreak;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['status' => ['Status', 'getStatus', 'setStatus'], 'failingStreak' => ['FailingStreak', 'getFailingStreak', 'setFailingStreak']];
    }
}
