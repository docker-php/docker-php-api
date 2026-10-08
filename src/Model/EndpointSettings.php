<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class EndpointSettings implements AdditionalPropertiesInterface
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
     * EndpointIPAMConfig represents an endpoint's IPAM configuration.
     *
     * @var EndpointIPAMConfig|null
     */
    protected $iPAMConfig;
    /**
     * @var list<string>|null
     */
    protected $links;
    /**
     * MAC address for the endpoint on this network. The network driver might ignore this parameter.
     *
     * @var string|null
     */
    protected $macAddress;
    /**
     * @var list<string>|null
     */
    protected $aliases;
    /**
     * DriverOpts is a mapping of driver options and values. These options
     * are passed directly to the driver and are driver specific.
     *
     * @var array<string, string>|null
     */
    protected $driverOpts;
    /**
     * This property determines which endpoint will provide the default
     * gateway for a container. The endpoint with the highest priority will
     * be used. If multiple endpoints have the same priority, endpoints are
     * lexicographically sorted based on their network name, and the one
     * that sorts first is picked.
     *
     * @var int|null
     */
    protected $gwPriority;
    /**
     * Unique ID of the network.
     *
     * @var string|null
     */
    protected $networkID;
    /**
     * Unique ID for the service endpoint in a Sandbox.
     *
     * @var string|null
     */
    protected $endpointID;
    /**
     * Gateway address for this network.
     *
     * @var string|null
     */
    protected $gateway;
    /**
     * IPv4 address.
     *
     * @var string|null
     */
    protected $iPAddress;
    /**
     * Mask length of the IPv4 address.
     *
     * @var int|null
     */
    protected $iPPrefixLen;
    /**
     * IPv6 gateway address.
     *
     * @var string|null
     */
    protected $iPv6Gateway;
    /**
     * Global IPv6 address.
     *
     * @var string|null
     */
    protected $globalIPv6Address;
    /**
     * Mask length of the global IPv6 address.
     *
     * @var int|null
     */
    protected $globalIPv6PrefixLen;
    /**
     * List of all DNS names an endpoint has on a specific network. This
     * list is based on the container name, network aliases, container short
     * ID, and hostname.
     *
     * These DNS names are non-fully qualified but can contain several dots.
     * You can get fully qualified DNS names by appending `.<network-name>`.
     * For instance, if container name is `my.ctr` and the network is named
     * `testnet`, `DNSNames` will contain `my.ctr` and the FQDN will be
     * `my.ctr.testnet`.
     *
     * @var list<string>|null
     */
    protected $dNSNames;

    /**
     * EndpointIPAMConfig represents an endpoint's IPAM configuration.
     */
    public function getIPAMConfig(): ?EndpointIPAMConfig
    {
        return $this->iPAMConfig;
    }

    /**
     * EndpointIPAMConfig represents an endpoint's IPAM configuration.
     */
    public function setIPAMConfig(?EndpointIPAMConfig $iPAMConfig): self
    {
        $this->initialized['iPAMConfig'] = true;
        $this->iPAMConfig = $iPAMConfig;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getLinks(): ?array
    {
        return $this->links;
    }

    /**
     * @param list<string>|null $links
     */
    public function setLinks(?array $links): self
    {
        $this->initialized['links'] = true;
        $this->links = $links;

        return $this;
    }

    /**
     * MAC address for the endpoint on this network. The network driver might ignore this parameter.
     */
    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    /**
     * MAC address for the endpoint on this network. The network driver might ignore this parameter.
     */
    public function setMacAddress(?string $macAddress): self
    {
        $this->initialized['macAddress'] = true;
        $this->macAddress = $macAddress;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getAliases(): ?array
    {
        return $this->aliases;
    }

    /**
     * @param list<string>|null $aliases
     */
    public function setAliases(?array $aliases): self
    {
        $this->initialized['aliases'] = true;
        $this->aliases = $aliases;

        return $this;
    }

    /**
     * DriverOpts is a mapping of driver options and values. These options
     * are passed directly to the driver and are driver specific.
     *
     * @return array<string, string>|null
     */
    public function getDriverOpts(): ?iterable
    {
        return $this->driverOpts;
    }

    /**
     * DriverOpts is a mapping of driver options and values. These options
     * are passed directly to the driver and are driver specific.
     *
     * @param array<string, string>|null $driverOpts
     */
    public function setDriverOpts(?iterable $driverOpts): self
    {
        $this->initialized['driverOpts'] = true;
        $this->driverOpts = $driverOpts;

        return $this;
    }

    /**
     * This property determines which endpoint will provide the default
     * gateway for a container. The endpoint with the highest priority will
     * be used. If multiple endpoints have the same priority, endpoints are
     * lexicographically sorted based on their network name, and the one
     * that sorts first is picked.
     */
    public function getGwPriority(): ?int
    {
        return $this->gwPriority;
    }

    /**
     * This property determines which endpoint will provide the default
     * gateway for a container. The endpoint with the highest priority will
     * be used. If multiple endpoints have the same priority, endpoints are
     * lexicographically sorted based on their network name, and the one
     * that sorts first is picked.
     */
    public function setGwPriority(?int $gwPriority): self
    {
        $this->initialized['gwPriority'] = true;
        $this->gwPriority = $gwPriority;

        return $this;
    }

    /**
     * Unique ID of the network.
     */
    public function getNetworkID(): ?string
    {
        return $this->networkID;
    }

    /**
     * Unique ID of the network.
     */
    public function setNetworkID(?string $networkID): self
    {
        $this->initialized['networkID'] = true;
        $this->networkID = $networkID;

        return $this;
    }

    /**
     * Unique ID for the service endpoint in a Sandbox.
     */
    public function getEndpointID(): ?string
    {
        return $this->endpointID;
    }

    /**
     * Unique ID for the service endpoint in a Sandbox.
     */
    public function setEndpointID(?string $endpointID): self
    {
        $this->initialized['endpointID'] = true;
        $this->endpointID = $endpointID;

        return $this;
    }

    /**
     * Gateway address for this network.
     */
    public function getGateway(): ?string
    {
        return $this->gateway;
    }

    /**
     * Gateway address for this network.
     */
    public function setGateway(?string $gateway): self
    {
        $this->initialized['gateway'] = true;
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * IPv4 address.
     */
    public function getIPAddress(): ?string
    {
        return $this->iPAddress;
    }

    /**
     * IPv4 address.
     */
    public function setIPAddress(?string $iPAddress): self
    {
        $this->initialized['iPAddress'] = true;
        $this->iPAddress = $iPAddress;

        return $this;
    }

    /**
     * Mask length of the IPv4 address.
     */
    public function getIPPrefixLen(): ?int
    {
        return $this->iPPrefixLen;
    }

    /**
     * Mask length of the IPv4 address.
     */
    public function setIPPrefixLen(?int $iPPrefixLen): self
    {
        $this->initialized['iPPrefixLen'] = true;
        $this->iPPrefixLen = $iPPrefixLen;

        return $this;
    }

    /**
     * IPv6 gateway address.
     */
    public function getIPv6Gateway(): ?string
    {
        return $this->iPv6Gateway;
    }

    /**
     * IPv6 gateway address.
     */
    public function setIPv6Gateway(?string $iPv6Gateway): self
    {
        $this->initialized['iPv6Gateway'] = true;
        $this->iPv6Gateway = $iPv6Gateway;

        return $this;
    }

    /**
     * Global IPv6 address.
     */
    public function getGlobalIPv6Address(): ?string
    {
        return $this->globalIPv6Address;
    }

    /**
     * Global IPv6 address.
     */
    public function setGlobalIPv6Address(?string $globalIPv6Address): self
    {
        $this->initialized['globalIPv6Address'] = true;
        $this->globalIPv6Address = $globalIPv6Address;

        return $this;
    }

    /**
     * Mask length of the global IPv6 address.
     */
    public function getGlobalIPv6PrefixLen(): ?int
    {
        return $this->globalIPv6PrefixLen;
    }

    /**
     * Mask length of the global IPv6 address.
     */
    public function setGlobalIPv6PrefixLen(?int $globalIPv6PrefixLen): self
    {
        $this->initialized['globalIPv6PrefixLen'] = true;
        $this->globalIPv6PrefixLen = $globalIPv6PrefixLen;

        return $this;
    }

    /**
     * List of all DNS names an endpoint has on a specific network. This
     * list is based on the container name, network aliases, container short
     * ID, and hostname.
     *
     * These DNS names are non-fully qualified but can contain several dots.
     * You can get fully qualified DNS names by appending `.<network-name>`.
     * For instance, if container name is `my.ctr` and the network is named
     * `testnet`, `DNSNames` will contain `my.ctr` and the FQDN will be
     * `my.ctr.testnet`.
     *
     * @return list<string>|null
     */
    public function getDNSNames(): ?array
    {
        return $this->dNSNames;
    }

    /**
     * List of all DNS names an endpoint has on a specific network. This
     * list is based on the container name, network aliases, container short
     * ID, and hostname.
     *
     * These DNS names are non-fully qualified but can contain several dots.
     * You can get fully qualified DNS names by appending `.<network-name>`.
     * For instance, if container name is `my.ctr` and the network is named
     * `testnet`, `DNSNames` will contain `my.ctr` and the FQDN will be
     * `my.ctr.testnet`.
     *
     * @param list<string>|null $dNSNames
     */
    public function setDNSNames(?array $dNSNames): self
    {
        $this->initialized['dNSNames'] = true;
        $this->dNSNames = $dNSNames;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['iPAMConfig' => ['IPAMConfig', 'getIPAMConfig', 'setIPAMConfig'], 'links' => ['Links', 'getLinks', 'setLinks'], 'macAddress' => ['MacAddress', 'getMacAddress', 'setMacAddress'], 'aliases' => ['Aliases', 'getAliases', 'setAliases'], 'driverOpts' => ['DriverOpts', 'getDriverOpts', 'setDriverOpts'], 'gwPriority' => ['GwPriority', 'getGwPriority', 'setGwPriority'], 'networkID' => ['NetworkID', 'getNetworkID', 'setNetworkID'], 'endpointID' => ['EndpointID', 'getEndpointID', 'setEndpointID'], 'gateway' => ['Gateway', 'getGateway', 'setGateway'], 'iPAddress' => ['IPAddress', 'getIPAddress', 'setIPAddress'], 'iPPrefixLen' => ['IPPrefixLen', 'getIPPrefixLen', 'setIPPrefixLen'], 'iPv6Gateway' => ['IPv6Gateway', 'getIPv6Gateway', 'setIPv6Gateway'], 'globalIPv6Address' => ['GlobalIPv6Address', 'getGlobalIPv6Address', 'setGlobalIPv6Address'], 'globalIPv6PrefixLen' => ['GlobalIPv6PrefixLen', 'getGlobalIPv6PrefixLen', 'setGlobalIPv6PrefixLen'], 'dNSNames' => ['DNSNames', 'getDNSNames', 'setDNSNames']];
    }
}
