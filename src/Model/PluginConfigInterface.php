<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class PluginConfigInterface implements AdditionalPropertiesInterface
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
     * @var list<string>|null
     */
    protected $types;
    /**
     * @var string|null
     */
    protected $socket;
    /**
     * Protocol to use for clients connecting to the plugin.
     *
     * @var string|null
     */
    protected $protocolScheme;

    /**
     * @return list<string>|null
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @param list<string>|null $types
     */
    public function setTypes(?array $types): self
    {
        $this->initialized['types'] = true;
        $this->types = $types;

        return $this;
    }

    public function getSocket(): ?string
    {
        return $this->socket;
    }

    public function setSocket(?string $socket): self
    {
        $this->initialized['socket'] = true;
        $this->socket = $socket;

        return $this;
    }

    /**
     * Protocol to use for clients connecting to the plugin.
     */
    public function getProtocolScheme(): ?string
    {
        return $this->protocolScheme;
    }

    /**
     * Protocol to use for clients connecting to the plugin.
     */
    public function setProtocolScheme(?string $protocolScheme): self
    {
        $this->initialized['protocolScheme'] = true;
        $this->protocolScheme = $protocolScheme;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['types' => ['Types', 'getTypes', 'setTypes'], 'socket' => ['Socket', 'getSocket', 'setSocket'], 'protocolScheme' => ['ProtocolScheme', 'getProtocolScheme', 'setProtocolScheme']];
    }
}
