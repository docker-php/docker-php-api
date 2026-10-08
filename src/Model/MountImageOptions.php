<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class MountImageOptions implements AdditionalPropertiesInterface
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
     * Source path inside the image. Must be relative without any back traversals.
     *
     * @var string|null
     */
    protected $subpath;

    /**
     * Source path inside the image. Must be relative without any back traversals.
     */
    public function getSubpath(): ?string
    {
        return $this->subpath;
    }

    /**
     * Source path inside the image. Must be relative without any back traversals.
     */
    public function setSubpath(?string $subpath): self
    {
        $this->initialized['subpath'] = true;
        $this->subpath = $subpath;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['subpath' => ['Subpath', 'getSubpath', 'setSubpath']];
    }
}
