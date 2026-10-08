<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class NetworkTaskInfo implements AdditionalPropertiesInterface
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
    protected $endpointIP;
    /**
     * @var array<string, string>|null
     */
    protected $info;

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

    public function getEndpointIP(): ?string
    {
        return $this->endpointIP;
    }

    public function setEndpointIP(?string $endpointIP): self
    {
        $this->initialized['endpointIP'] = true;
        $this->endpointIP = $endpointIP;

        return $this;
    }

    /**
     * @return array<string, string>|null
     */
    public function getInfo(): ?iterable
    {
        return $this->info;
    }

    /**
     * @param array<string, string>|null $info
     */
    public function setInfo(?iterable $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['Name', 'getName', 'setName'], 'endpointID' => ['EndpointID', 'getEndpointID', 'setEndpointID'], 'endpointIP' => ['EndpointIP', 'getEndpointIP', 'setEndpointIP'], 'info' => ['Info', 'getInfo', 'setInfo']];
    }
}
