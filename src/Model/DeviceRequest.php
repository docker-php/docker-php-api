<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class DeviceRequest implements AdditionalPropertiesInterface
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
     * The name of the device driver to use for this request.
     *
     * Note that if this is specified the capabilities are ignored when
     * selecting a device driver.
     *
     * @var string|null
     */
    protected $driver;
    /**
     * @var int|null
     */
    protected $count;
    /**
     * @var list<string>|null
     */
    protected $deviceIDs;
    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * Note that if a driver is specified the capabilities have no effect on
     * selecting a driver as the driver name is used directly.
     *
     * Note that if no driver is specified the capabilities are used to
     * select a driver with the required capabilities.
     *
     * @var list<list<string>>|null
     */
    protected $capabilities;
    /**
     * Driver-specific options, specified as a key/value pairs. These options
     * are passed directly to the driver.
     *
     * @var array<string, string>|null
     */
    protected $options;

    /**
     * The name of the device driver to use for this request.
     *
     * Note that if this is specified the capabilities are ignored when
     * selecting a device driver.
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * The name of the device driver to use for this request.
     *
     * Note that if this is specified the capabilities are ignored when
     * selecting a device driver.
     */
    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getDeviceIDs(): ?array
    {
        return $this->deviceIDs;
    }

    /**
     * @param list<string>|null $deviceIDs
     */
    public function setDeviceIDs(?array $deviceIDs): self
    {
        $this->initialized['deviceIDs'] = true;
        $this->deviceIDs = $deviceIDs;

        return $this;
    }

    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * Note that if a driver is specified the capabilities have no effect on
     * selecting a driver as the driver name is used directly.
     *
     * Note that if no driver is specified the capabilities are used to
     * select a driver with the required capabilities.
     *
     * @return list<list<string>>|null
     */
    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }

    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * Note that if a driver is specified the capabilities have no effect on
     * selecting a driver as the driver name is used directly.
     *
     * Note that if no driver is specified the capabilities are used to
     * select a driver with the required capabilities.
     *
     * @param list<list<string>>|null $capabilities
     */
    public function setCapabilities(?array $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;

        return $this;
    }

    /**
     * Driver-specific options, specified as a key/value pairs. These options
     * are passed directly to the driver.
     *
     * @return array<string, string>|null
     */
    public function getOptions(): ?iterable
    {
        return $this->options;
    }

    /**
     * Driver-specific options, specified as a key/value pairs. These options
     * are passed directly to the driver.
     *
     * @param array<string, string>|null $options
     */
    public function setOptions(?iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['driver' => ['Driver', 'getDriver', 'setDriver'], 'count' => ['Count', 'getCount', 'setCount'], 'deviceIDs' => ['DeviceIDs', 'getDeviceIDs', 'setDeviceIDs'], 'capabilities' => ['Capabilities', 'getCapabilities', 'setCapabilities'], 'options' => ['Options', 'getOptions', 'setOptions']];
    }
}
