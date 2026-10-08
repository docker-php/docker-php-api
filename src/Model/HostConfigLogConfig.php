<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class HostConfigLogConfig implements AdditionalPropertiesInterface
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
     * Name of the logging driver used for the container or "none"
     * if logging is disabled.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Driver-specific configuration options for the logging driver.
     *
     * @var array<string, string>|null
     */
    protected $config;

    /**
     * Name of the logging driver used for the container or "none"
     * if logging is disabled.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Name of the logging driver used for the container or "none"
     * if logging is disabled.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Driver-specific configuration options for the logging driver.
     *
     * @return array<string, string>|null
     */
    public function getConfig(): ?iterable
    {
        return $this->config;
    }

    /**
     * Driver-specific configuration options for the logging driver.
     *
     * @param array<string, string>|null $config
     */
    public function setConfig(?iterable $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['Type', 'getType', 'setType'], 'config' => ['Config', 'getConfig', 'setConfig']];
    }
}
