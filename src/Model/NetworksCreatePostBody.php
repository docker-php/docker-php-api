<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class NetworksCreatePostBody implements AdditionalPropertiesInterface
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
     * The network's name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Name of the network driver plugin to use.
     *
     * @var string|null
     */
    protected $driver = 'bridge';
    /**
     * The level at which the network exists (e.g. `swarm` for cluster-wide
     * or `local` for machine level).
     *
     * @var string|null
     */
    protected $scope;
    /**
     * Restrict external access to the network.
     *
     * @var bool|null
     */
    protected $internal;
    /**
     * Globally scoped network is manually attachable by regular
     * containers from workers in swarm mode.
     *
     * @var bool|null
     */
    protected $attachable;
    /**
     * Ingress network is the network which provides the routing-mesh
     * in swarm mode.
     *
     * @var bool|null
     */
    protected $ingress;
    /**
     * Creates a config-only network. Config-only networks are placeholder
     * networks for network configurations to be used by other networks.
     * Config-only networks cannot be used directly to run containers
     * or services.
     *
     * @var bool|null
     */
    protected $configOnly = false;
    /**
     * The config-only network source to provide the configuration for
     * this network.
     *
     * @var ConfigReference|null
     */
    protected $configFrom;
    /**
     * @var IPAM|null
     */
    protected $iPAM;
    /**
     * Enable IPv6 on the network.
     *
     * @var bool|null
     */
    protected $enableIPv6;
    /**
     * Network specific options to be used by the drivers.
     *
     * @var array<string, string>|null
     */
    protected $options;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>|null
     */
    protected $labels;

    /**
     * The network's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * The network's name.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Name of the network driver plugin to use.
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * Name of the network driver plugin to use.
     */
    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * The level at which the network exists (e.g. `swarm` for cluster-wide
     * or `local` for machine level).
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * The level at which the network exists (e.g. `swarm` for cluster-wide
     * or `local` for machine level).
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * Restrict external access to the network.
     */
    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    /**
     * Restrict external access to the network.
     */
    public function setInternal(?bool $internal): self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;

        return $this;
    }

    /**
     * Globally scoped network is manually attachable by regular
     * containers from workers in swarm mode.
     */
    public function getAttachable(): ?bool
    {
        return $this->attachable;
    }

    /**
     * Globally scoped network is manually attachable by regular
     * containers from workers in swarm mode.
     */
    public function setAttachable(?bool $attachable): self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;

        return $this;
    }

    /**
     * Ingress network is the network which provides the routing-mesh
     * in swarm mode.
     */
    public function getIngress(): ?bool
    {
        return $this->ingress;
    }

    /**
     * Ingress network is the network which provides the routing-mesh
     * in swarm mode.
     */
    public function setIngress(?bool $ingress): self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;

        return $this;
    }

    /**
     * Creates a config-only network. Config-only networks are placeholder
     * networks for network configurations to be used by other networks.
     * Config-only networks cannot be used directly to run containers
     * or services.
     */
    public function getConfigOnly(): ?bool
    {
        return $this->configOnly;
    }

    /**
     * Creates a config-only network. Config-only networks are placeholder
     * networks for network configurations to be used by other networks.
     * Config-only networks cannot be used directly to run containers
     * or services.
     */
    public function setConfigOnly(?bool $configOnly): self
    {
        $this->initialized['configOnly'] = true;
        $this->configOnly = $configOnly;

        return $this;
    }

    /**
     * The config-only network source to provide the configuration for
     * this network.
     */
    public function getConfigFrom(): ?ConfigReference
    {
        return $this->configFrom;
    }

    /**
     * The config-only network source to provide the configuration for
     * this network.
     */
    public function setConfigFrom(?ConfigReference $configFrom): self
    {
        $this->initialized['configFrom'] = true;
        $this->configFrom = $configFrom;

        return $this;
    }

    public function getIPAM(): ?IPAM
    {
        return $this->iPAM;
    }

    public function setIPAM(?IPAM $iPAM): self
    {
        $this->initialized['iPAM'] = true;
        $this->iPAM = $iPAM;

        return $this;
    }

    /**
     * Enable IPv6 on the network.
     */
    public function getEnableIPv6(): ?bool
    {
        return $this->enableIPv6;
    }

    /**
     * Enable IPv6 on the network.
     */
    public function setEnableIPv6(?bool $enableIPv6): self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;

        return $this;
    }

    /**
     * Network specific options to be used by the drivers.
     *
     * @return array<string, string>|null
     */
    public function getOptions(): ?iterable
    {
        return $this->options;
    }

    /**
     * Network specific options to be used by the drivers.
     *
     * @param array<string, string>|null $options
     */
    public function setOptions(?iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string>|null $labels
     */
    public function setLabels(?iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['Name', 'getName', 'setName'], 'driver' => ['Driver', 'getDriver', 'setDriver'], 'scope' => ['Scope', 'getScope', 'setScope'], 'internal' => ['Internal', 'getInternal', 'setInternal'], 'attachable' => ['Attachable', 'getAttachable', 'setAttachable'], 'ingress' => ['Ingress', 'getIngress', 'setIngress'], 'configOnly' => ['ConfigOnly', 'getConfigOnly', 'setConfigOnly'], 'configFrom' => ['ConfigFrom', 'getConfigFrom', 'setConfigFrom'], 'iPAM' => ['IPAM', 'getIPAM', 'setIPAM'], 'enableIPv6' => ['EnableIPv6', 'getEnableIPv6', 'setEnableIPv6'], 'options' => ['Options', 'getOptions', 'setOptions'], 'labels' => ['Labels', 'getLabels', 'setLabels']];
    }
}
