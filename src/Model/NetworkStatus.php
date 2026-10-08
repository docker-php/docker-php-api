<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class NetworkStatus implements AdditionalPropertiesInterface
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
     * @var IPAMStatus|null
     */
    protected $iPAM;

    public function getIPAM(): ?IPAMStatus
    {
        return $this->iPAM;
    }

    public function setIPAM(?IPAMStatus $iPAM): self
    {
        $this->initialized['iPAM'] = true;
        $this->iPAM = $iPAM;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['iPAM' => ['IPAM', 'getIPAM', 'setIPAM']];
    }
}
