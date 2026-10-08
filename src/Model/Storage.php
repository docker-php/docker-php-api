<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class Storage implements AdditionalPropertiesInterface
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
     * Information about the storage used for the container's root filesystem.
     *
     * @var RootFSStorage|null
     */
    protected $rootFS;

    /**
     * Information about the storage used for the container's root filesystem.
     */
    public function getRootFS(): ?RootFSStorage
    {
        return $this->rootFS;
    }

    /**
     * Information about the storage used for the container's root filesystem.
     */
    public function setRootFS(?RootFSStorage $rootFS): self
    {
        $this->initialized['rootFS'] = true;
        $this->rootFS = $rootFS;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['rootFS' => ['RootFS', 'getRootFS', 'setRootFS']];
    }
}
