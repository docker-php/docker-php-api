<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class NetworkCreateResponse implements AdditionalPropertiesInterface
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
     * The ID of the created network.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Warnings encountered when creating the container.
     *
     * @var string|null
     */
    protected $warning;

    /**
     * The ID of the created network.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID of the created network.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Warnings encountered when creating the container.
     */
    public function getWarning(): ?string
    {
        return $this->warning;
    }

    /**
     * Warnings encountered when creating the container.
     */
    public function setWarning(?string $warning): self
    {
        $this->initialized['warning'] = true;
        $this->warning = $warning;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['Id', 'getId', 'setId'], 'warning' => ['Warning', 'getWarning', 'setWarning']];
    }
}
