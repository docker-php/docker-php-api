<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class IPAMStatus implements AdditionalPropertiesInterface
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
     * @var array<string, SubnetStatus>|null
     */
    protected $subnets;

    /**
     * @return array<string, SubnetStatus>|null
     */
    public function getSubnets(): ?iterable
    {
        return $this->subnets;
    }

    /**
     * @param array<string, SubnetStatus>|null $subnets
     */
    public function setSubnets(?iterable $subnets): self
    {
        $this->initialized['subnets'] = true;
        $this->subnets = $subnets;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['subnets' => ['Subnets', 'getSubnets', 'setSubnets']];
    }
}
