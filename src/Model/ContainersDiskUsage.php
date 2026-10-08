<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainersDiskUsage implements AdditionalPropertiesInterface
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
     * Count of active containers.
     *
     * @var int|null
     */
    protected $activeCount;
    /**
     * Count of all containers.
     *
     * @var int|null
     */
    protected $totalCount;
    /**
     * Disk space that can be reclaimed by removing inactive containers.
     *
     * @var int|null
     */
    protected $reclaimable;
    /**
     * Disk space in use by containers.
     *
     * @var int|null
     */
    protected $totalSize;
    /**
     * List of container summaries.
     *
     * @var list<mixed>|null
     */
    protected $items;

    /**
     * Count of active containers.
     */
    public function getActiveCount(): ?int
    {
        return $this->activeCount;
    }

    /**
     * Count of active containers.
     */
    public function setActiveCount(?int $activeCount): self
    {
        $this->initialized['activeCount'] = true;
        $this->activeCount = $activeCount;

        return $this;
    }

    /**
     * Count of all containers.
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * Count of all containers.
     */
    public function setTotalCount(?int $totalCount): self
    {
        $this->initialized['totalCount'] = true;
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * Disk space that can be reclaimed by removing inactive containers.
     */
    public function getReclaimable(): ?int
    {
        return $this->reclaimable;
    }

    /**
     * Disk space that can be reclaimed by removing inactive containers.
     */
    public function setReclaimable(?int $reclaimable): self
    {
        $this->initialized['reclaimable'] = true;
        $this->reclaimable = $reclaimable;

        return $this;
    }

    /**
     * Disk space in use by containers.
     */
    public function getTotalSize(): ?int
    {
        return $this->totalSize;
    }

    /**
     * Disk space in use by containers.
     */
    public function setTotalSize(?int $totalSize): self
    {
        $this->initialized['totalSize'] = true;
        $this->totalSize = $totalSize;

        return $this;
    }

    /**
     * List of container summaries.
     *
     * @return list<mixed>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * List of container summaries.
     *
     * @param list<mixed>|null $items
     */
    public function setItems(?array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['activeCount' => ['ActiveCount', 'getActiveCount', 'setActiveCount'], 'totalCount' => ['TotalCount', 'getTotalCount', 'setTotalCount'], 'reclaimable' => ['Reclaimable', 'getReclaimable', 'setReclaimable'], 'totalSize' => ['TotalSize', 'getTotalSize', 'setTotalSize'], 'items' => ['Items', 'getItems', 'setItems']];
    }
}
