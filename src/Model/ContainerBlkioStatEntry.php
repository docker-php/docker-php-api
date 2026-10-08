<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerBlkioStatEntry implements AdditionalPropertiesInterface
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
     * @var int|null
     */
    protected $major;
    /**
     * @var int|null
     */
    protected $minor;
    /**
     * @var string|null
     */
    protected $op;
    /**
     * @var int|null
     */
    protected $value;

    public function getMajor(): ?int
    {
        return $this->major;
    }

    public function setMajor(?int $major): self
    {
        $this->initialized['major'] = true;
        $this->major = $major;

        return $this;
    }

    public function getMinor(): ?int
    {
        return $this->minor;
    }

    public function setMinor(?int $minor): self
    {
        $this->initialized['minor'] = true;
        $this->minor = $minor;

        return $this;
    }

    public function getOp(): ?string
    {
        return $this->op;
    }

    public function setOp(?string $op): self
    {
        $this->initialized['op'] = true;
        $this->op = $op;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['major' => ['major', 'getMajor', 'setMajor'], 'minor' => ['minor', 'getMinor', 'setMinor'], 'op' => ['op', 'getOp', 'setOp'], 'value' => ['value', 'getValue', 'setValue']];
    }
}
