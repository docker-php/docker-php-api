<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class FirewallInfo implements AdditionalPropertiesInterface
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
     * The name of the firewall backend driver.
     *
     * @var string|null
     */
    protected $driver;
    /**
     * Information about the firewall backend, provided as
     * "label" / "value" pairs.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @var list<list<string>>|null
     */
    protected $info;

    /**
     * The name of the firewall backend driver.
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * The name of the firewall backend driver.
     */
    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * Information about the firewall backend, provided as
     * "label" / "value" pairs.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @return list<list<string>>|null
     */
    public function getInfo(): ?array
    {
        return $this->info;
    }

    /**
     * Information about the firewall backend, provided as
     * "label" / "value" pairs.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @param list<list<string>>|null $info
     */
    public function setInfo(?array $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['driver' => ['Driver', 'getDriver', 'setDriver'], 'info' => ['Info', 'getInfo', 'setInfo']];
    }
}
