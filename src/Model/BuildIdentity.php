<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class BuildIdentity implements AdditionalPropertiesInterface
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
     * Ref is the identifier for the build request. This reference can be used to
     * look up the build details in BuildKit history API.
     *
     * @var string|null
     */
    protected $ref;
    /**
     * CreatedAt is the time when the build ran.
     *
     * @var \DateTimeInterface|null
     */
    protected $createdAt;

    /**
     * Ref is the identifier for the build request. This reference can be used to
     * look up the build details in BuildKit history API.
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * Ref is the identifier for the build request. This reference can be used to
     * look up the build details in BuildKit history API.
     */
    public function setRef(?string $ref): self
    {
        $this->initialized['ref'] = true;
        $this->ref = $ref;

        return $this;
    }

    /**
     * CreatedAt is the time when the build ran.
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * CreatedAt is the time when the build ran.
     */
    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['ref' => ['Ref', 'getRef', 'setRef'], 'createdAt' => ['CreatedAt', 'getCreatedAt', 'setCreatedAt']];
    }
}
