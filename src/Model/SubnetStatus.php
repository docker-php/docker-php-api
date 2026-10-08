<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class SubnetStatus implements AdditionalPropertiesInterface
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
     * Number of IP addresses in the subnet that are in use or reserved and are therefore unavailable for allocation, saturating at 2<sup>64</sup> - 1.
     *
     * @var int|null
     */
    protected $iPsInUse;
    /**
     * Number of IP addresses within the network's IPRange for the subnet that are available for allocation, saturating at 2<sup>64</sup> - 1.
     *
     * @var int|null
     */
    protected $dynamicIPsAvailable;

    /**
     * Number of IP addresses in the subnet that are in use or reserved and are therefore unavailable for allocation, saturating at 2<sup>64</sup> - 1.
     */
    public function getIPsInUse(): ?int
    {
        return $this->iPsInUse;
    }

    /**
     * Number of IP addresses in the subnet that are in use or reserved and are therefore unavailable for allocation, saturating at 2<sup>64</sup> - 1.
     */
    public function setIPsInUse(?int $iPsInUse): self
    {
        $this->initialized['iPsInUse'] = true;
        $this->iPsInUse = $iPsInUse;

        return $this;
    }

    /**
     * Number of IP addresses within the network's IPRange for the subnet that are available for allocation, saturating at 2<sup>64</sup> - 1.
     */
    public function getDynamicIPsAvailable(): ?int
    {
        return $this->dynamicIPsAvailable;
    }

    /**
     * Number of IP addresses within the network's IPRange for the subnet that are available for allocation, saturating at 2<sup>64</sup> - 1.
     */
    public function setDynamicIPsAvailable(?int $dynamicIPsAvailable): self
    {
        $this->initialized['dynamicIPsAvailable'] = true;
        $this->dynamicIPsAvailable = $dynamicIPsAvailable;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['iPsInUse' => ['IPsInUse', 'getIPsInUse', 'setIPsInUse'], 'dynamicIPsAvailable' => ['DynamicIPsAvailable', 'getDynamicIPsAvailable', 'setDynamicIPsAvailable']];
    }
}
