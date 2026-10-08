<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerSummaryNetworkSettings implements AdditionalPropertiesInterface
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
     * Summary of network-settings for each network the container is
     * attached to.
     *
     * @var array<string, EndpointSettings>|null
     */
    protected $networks;

    /**
     * Summary of network-settings for each network the container is
     * attached to.
     *
     * @return array<string, EndpointSettings>|null
     */
    public function getNetworks(): ?iterable
    {
        return $this->networks;
    }

    /**
     * Summary of network-settings for each network the container is
     * attached to.
     *
     * @param array<string, EndpointSettings>|null $networks
     */
    public function setNetworks(?iterable $networks): self
    {
        $this->initialized['networks'] = true;
        $this->networks = $networks;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['networks' => ['Networks', 'getNetworks', 'setNetworks']];
    }
}
