<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class TaskSpecResources implements AdditionalPropertiesInterface
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
     * An object describing a limit on resources which can be requested by a task.
     *
     * @var Limit|null
     */
    protected $limits;
    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     *
     * @var ResourceObject|null
     */
    protected $reservations;
    /**
     * Amount of swap in bytes - can only be used together with a memory limit.
     * If not specified, the default behaviour is to grant a swap space twice
     * as big as the memory limit.
     * Set to -1 to enable unlimited swap.
     *
     * @var int|null
     */
    protected $swapBytes;
    /**
     * Tune the service's containers' memory swappiness (0 to 100).
     * If not specified, defaults to the containers' OS' default, generally 60,
     * or whatever value was predefined in the image.
     * Set to -1 to unset a previously set value.
     *
     * @var int|null
     */
    protected $memorySwappiness;

    /**
     * An object describing a limit on resources which can be requested by a task.
     */
    public function getLimits(): ?Limit
    {
        return $this->limits;
    }

    /**
     * An object describing a limit on resources which can be requested by a task.
     */
    public function setLimits(?Limit $limits): self
    {
        $this->initialized['limits'] = true;
        $this->limits = $limits;

        return $this;
    }

    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     */
    public function getReservations(): ?ResourceObject
    {
        return $this->reservations;
    }

    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     */
    public function setReservations(?ResourceObject $reservations): self
    {
        $this->initialized['reservations'] = true;
        $this->reservations = $reservations;

        return $this;
    }

    /**
     * Amount of swap in bytes - can only be used together with a memory limit.
     * If not specified, the default behaviour is to grant a swap space twice
     * as big as the memory limit.
     * Set to -1 to enable unlimited swap.
     */
    public function getSwapBytes(): ?int
    {
        return $this->swapBytes;
    }

    /**
     * Amount of swap in bytes - can only be used together with a memory limit.
     * If not specified, the default behaviour is to grant a swap space twice
     * as big as the memory limit.
     * Set to -1 to enable unlimited swap.
     */
    public function setSwapBytes(?int $swapBytes): self
    {
        $this->initialized['swapBytes'] = true;
        $this->swapBytes = $swapBytes;

        return $this;
    }

    /**
     * Tune the service's containers' memory swappiness (0 to 100).
     * If not specified, defaults to the containers' OS' default, generally 60,
     * or whatever value was predefined in the image.
     * Set to -1 to unset a previously set value.
     */
    public function getMemorySwappiness(): ?int
    {
        return $this->memorySwappiness;
    }

    /**
     * Tune the service's containers' memory swappiness (0 to 100).
     * If not specified, defaults to the containers' OS' default, generally 60,
     * or whatever value was predefined in the image.
     * Set to -1 to unset a previously set value.
     */
    public function setMemorySwappiness(?int $memorySwappiness): self
    {
        $this->initialized['memorySwappiness'] = true;
        $this->memorySwappiness = $memorySwappiness;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['limits' => ['Limits', 'getLimits', 'setLimits'], 'reservations' => ['Reservations', 'getReservations', 'setReservations'], 'swapBytes' => ['SwapBytes', 'getSwapBytes', 'setSwapBytes'], 'memorySwappiness' => ['MemorySwappiness', 'getMemorySwappiness', 'setMemorySwappiness']];
    }
}
