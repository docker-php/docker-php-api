<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class PullIdentity implements AdditionalPropertiesInterface
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
     * Repository is the remote repository location the image was pulled from.
     *
     * @var string|null
     */
    protected $repository;

    /**
     * Repository is the remote repository location the image was pulled from.
     */
    public function getRepository(): ?string
    {
        return $this->repository;
    }

    /**
     * Repository is the remote repository location the image was pulled from.
     */
    public function setRepository(?string $repository): self
    {
        $this->initialized['repository'] = true;
        $this->repository = $repository;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['repository' => ['Repository', 'getRepository', 'setRepository']];
    }
}
