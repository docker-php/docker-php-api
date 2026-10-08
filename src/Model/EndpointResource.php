<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class EndpointResource implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $endpointID;
    /**
     * @var string|null
     */
    protected $macAddress;
    /**
     * @var string|null
     */
    protected $iPv4Address;
    /**
     * @var string|null
     */
    protected $iPv6Address;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getEndpointID(): ?string
    {
        return $this->endpointID;
    }

    public function setEndpointID(?string $endpointID): self
    {
        $this->initialized['endpointID'] = true;
        $this->endpointID = $endpointID;

        return $this;
    }

    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    public function setMacAddress(?string $macAddress): self
    {
        $this->initialized['macAddress'] = true;
        $this->macAddress = $macAddress;

        return $this;
    }

    public function getIPv4Address(): ?string
    {
        return $this->iPv4Address;
    }

    public function setIPv4Address(?string $iPv4Address): self
    {
        $this->initialized['iPv4Address'] = true;
        $this->iPv4Address = $iPv4Address;

        return $this;
    }

    public function getIPv6Address(): ?string
    {
        return $this->iPv6Address;
    }

    public function setIPv6Address(?string $iPv6Address): self
    {
        $this->initialized['iPv6Address'] = true;
        $this->iPv6Address = $iPv6Address;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['Name', 'getName', 'setName'], 'endpointID' => ['EndpointID', 'getEndpointID', 'setEndpointID'], 'macAddress' => ['MacAddress', 'getMacAddress', 'setMacAddress'], 'iPv4Address' => ['IPv4Address', 'getIPv4Address', 'setIPv4Address'], 'iPv6Address' => ['IPv6Address', 'getIPv6Address', 'setIPv6Address']];
    }
}
