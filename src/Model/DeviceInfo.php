<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class DeviceInfo implements AdditionalPropertiesInterface
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
     * The origin device driver.
     *
     * @var string|null
     */
    protected $source;
    /**
     * The unique identifier for the device within its source driver.
     * For CDI devices, this would be an FQDN like "vendor.com/gpu=0".
     *
     * @var string|null
     */
    protected $iD;

    /**
     * The origin device driver.
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * The origin device driver.
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * The unique identifier for the device within its source driver.
     * For CDI devices, this would be an FQDN like "vendor.com/gpu=0".
     */
    public function getID(): ?string
    {
        return $this->iD;
    }

    /**
     * The unique identifier for the device within its source driver.
     * For CDI devices, this would be an FQDN like "vendor.com/gpu=0".
     */
    public function setID(?string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['source' => ['Source', 'getSource', 'setSource'], 'iD' => ['ID', 'getID', 'setID']];
    }
}
