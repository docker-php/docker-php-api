<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class RootFSStorage implements AdditionalPropertiesInterface
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
     * Information about a snapshot backend of the container's root filesystem.
     *
     * @var RootFSStorageSnapshot|null
     */
    protected $snapshot;

    /**
     * Information about a snapshot backend of the container's root filesystem.
     */
    public function getSnapshot(): ?RootFSStorageSnapshot
    {
        return $this->snapshot;
    }

    /**
     * Information about a snapshot backend of the container's root filesystem.
     */
    public function setSnapshot(?RootFSStorageSnapshot $snapshot): self
    {
        $this->initialized['snapshot'] = true;
        $this->snapshot = $snapshot;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['snapshot' => ['Snapshot', 'getSnapshot', 'setSnapshot']];
    }
}
