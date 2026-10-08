<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class NetworkSummary implements AdditionalPropertiesInterface
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
     * Name of the network.
     *
     * @var string|null
     */
    protected $name;
    /**
     * ID that uniquely identifies a network on a single machine.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Date and time at which the network was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string|null
     */
    protected $created;
    /**
     * The level at which the network exists (e.g. `swarm` for cluster-wide
     * or `local` for machine level).
     *
     * @var string|null
     */
    protected $scope;
    /**
     * The name of the driver used to create the network (e.g. `bridge`,
     * `overlay`).
     *
     * @var string|null
     */
    protected $driver;
    /**
     * Whether the network was created with IPv4 enabled.
     *
     * @var bool|null
     */
    protected $enableIPv4;
    /**
     * Whether the network was created with IPv6 enabled.
     *
     * @var bool|null
     */
    protected $enableIPv6;
    /**
     * @var IPAM|null
     */
    protected $iPAM;
    /**
     * Whether the network is created to only allow internal networking
     * connectivity.
     *
     * @var bool|null
     */
    protected $internal = false;
    /**
     * Whether a global / swarm scope network is manually attachable by regular
     * containers from workers in swarm mode.
     *
     * @var bool|null
     */
    protected $attachable = false;
    /**
     * Whether the network is providing the routing-mesh for the swarm cluster.
     *
     * @var bool|null
     */
    protected $ingress = false;
    /**
     * The config-only network source to provide the configuration for
     * this network.
     *
     * @var ConfigReference|null
     */
    protected $configFrom;
    /**
     * Whether the network is a config-only network. Config-only networks are
     * placeholder networks for network configurations to be used by other
     * networks. Config-only networks cannot be used directly to run containers
     * or services.
     *
     * @var bool|null
     */
    protected $configOnly = false;
    /**
     * Network-specific options uses when creating the network.
     *
     * @var array<string, string>|null
     */
    protected $options;
    /**
     * Metadata specific to the network being created.
     *
     * @var array<string, string>|null
     */
    protected $labels;
    /**
     * List of peer nodes for an overlay network. This field is only present
     * for overlay networks, and omitted for other network types.
     *
     * @var list<PeerInfo>|null
     */
    protected $peers;

    /**
     * Name of the network.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the network.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * ID that uniquely identifies a network on a single machine.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * ID that uniquely identifies a network on a single machine.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Date and time at which the network was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * Date and time at which the network was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

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
     * The name of the driver used to create the network (e.g. `bridge`,
     * `overlay`).
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * The name of the driver used to create the network (e.g. `bridge`,
     * `overlay`).
     */
    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * Whether the network was created with IPv4 enabled.
     */
    public function getEnableIPv4(): ?bool
    {
        return $this->enableIPv4;
    }

    /**
     * Whether the network was created with IPv4 enabled.
     */
    public function setEnableIPv4(?bool $enableIPv4): self
    {
        $this->initialized['enableIPv4'] = true;
        $this->enableIPv4 = $enableIPv4;

        return $this;
    }

    /**
     * Whether the network was created with IPv6 enabled.
     */
    public function getEnableIPv6(): ?bool
    {
        return $this->enableIPv6;
    }

    /**
     * Whether the network was created with IPv6 enabled.
     */
    public function setEnableIPv6(?bool $enableIPv6): self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;

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
     * Whether the network is created to only allow internal networking
     * connectivity.
     */
    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    /**
     * Whether the network is created to only allow internal networking
     * connectivity.
     */
    public function setInternal(?bool $internal): self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;

        return $this;
    }

    /**
     * Whether a global / swarm scope network is manually attachable by regular
     * containers from workers in swarm mode.
     */
    public function getAttachable(): ?bool
    {
        return $this->attachable;
    }

    /**
     * Whether a global / swarm scope network is manually attachable by regular
     * containers from workers in swarm mode.
     */
    public function setAttachable(?bool $attachable): self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;

        return $this;
    }

    /**
     * Whether the network is providing the routing-mesh for the swarm cluster.
     */
    public function getIngress(): ?bool
    {
        return $this->ingress;
    }

    /**
     * Whether the network is providing the routing-mesh for the swarm cluster.
     */
    public function setIngress(?bool $ingress): self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;

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

    /**
     * Whether the network is a config-only network. Config-only networks are
     * placeholder networks for network configurations to be used by other
     * networks. Config-only networks cannot be used directly to run containers
     * or services.
     */
    public function getConfigOnly(): ?bool
    {
        return $this->configOnly;
    }

    /**
     * Whether the network is a config-only network. Config-only networks are
     * placeholder networks for network configurations to be used by other
     * networks. Config-only networks cannot be used directly to run containers
     * or services.
     */
    public function setConfigOnly(?bool $configOnly): self
    {
        $this->initialized['configOnly'] = true;
        $this->configOnly = $configOnly;

        return $this;
    }

    /**
     * Network-specific options uses when creating the network.
     *
     * @return array<string, string>|null
     */
    public function getOptions(): ?iterable
    {
        return $this->options;
    }

    /**
     * Network-specific options uses when creating the network.
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
     * Metadata specific to the network being created.
     *
     * @return array<string, string>|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * Metadata specific to the network being created.
     *
     * @param array<string, string>|null $labels
     */
    public function setLabels(?iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * List of peer nodes for an overlay network. This field is only present
     * for overlay networks, and omitted for other network types.
     *
     * @return list<PeerInfo>|null
     */
    public function getPeers(): ?array
    {
        return $this->peers;
    }

    /**
     * List of peer nodes for an overlay network. This field is only present
     * for overlay networks, and omitted for other network types.
     *
     * @param list<PeerInfo>|null $peers
     */
    public function setPeers(?array $peers): self
    {
        $this->initialized['peers'] = true;
        $this->peers = $peers;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['Name', 'getName', 'setName'], 'id' => ['Id', 'getId', 'setId'], 'created' => ['Created', 'getCreated', 'setCreated'], 'scope' => ['Scope', 'getScope', 'setScope'], 'driver' => ['Driver', 'getDriver', 'setDriver'], 'enableIPv4' => ['EnableIPv4', 'getEnableIPv4', 'setEnableIPv4'], 'enableIPv6' => ['EnableIPv6', 'getEnableIPv6', 'setEnableIPv6'], 'iPAM' => ['IPAM', 'getIPAM', 'setIPAM'], 'internal' => ['Internal', 'getInternal', 'setInternal'], 'attachable' => ['Attachable', 'getAttachable', 'setAttachable'], 'ingress' => ['Ingress', 'getIngress', 'setIngress'], 'configFrom' => ['ConfigFrom', 'getConfigFrom', 'setConfigFrom'], 'configOnly' => ['ConfigOnly', 'getConfigOnly', 'setConfigOnly'], 'options' => ['Options', 'getOptions', 'setOptions'], 'labels' => ['Labels', 'getLabels', 'setLabels'], 'peers' => ['Peers', 'getPeers', 'setPeers']];
    }
}
