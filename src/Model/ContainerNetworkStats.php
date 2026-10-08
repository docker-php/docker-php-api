<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerNetworkStats implements AdditionalPropertiesInterface
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
     * Bytes received. Windows and Linux.
     *
     * @var int|null
     */
    protected $rxBytes;
    /**
     * Packets received. Windows and Linux.
     *
     * @var int|null
     */
    protected $rxPackets;
    /**
     * Received errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     *
     * @var int|null
     */
    protected $rxErrors;
    /**
     * Incoming packets dropped. Windows and Linux.
     *
     * @var int|null
     */
    protected $rxDropped;
    /**
     * Bytes sent. Windows and Linux.
     *
     * @var int|null
     */
    protected $txBytes;
    /**
     * Packets sent. Windows and Linux.
     *
     * @var int|null
     */
    protected $txPackets;
    /**
     * Sent errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     *
     * @var int|null
     */
    protected $txErrors;
    /**
     * Outgoing packets dropped. Windows and Linux.
     *
     * @var int|null
     */
    protected $txDropped;
    /**
     * Endpoint ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var string|null
     */
    protected $endpointId;
    /**
     * Instance ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var string|null
     */
    protected $instanceId;

    /**
     * Bytes received. Windows and Linux.
     */
    public function getRxBytes(): ?int
    {
        return $this->rxBytes;
    }

    /**
     * Bytes received. Windows and Linux.
     */
    public function setRxBytes(?int $rxBytes): self
    {
        $this->initialized['rxBytes'] = true;
        $this->rxBytes = $rxBytes;

        return $this;
    }

    /**
     * Packets received. Windows and Linux.
     */
    public function getRxPackets(): ?int
    {
        return $this->rxPackets;
    }

    /**
     * Packets received. Windows and Linux.
     */
    public function setRxPackets(?int $rxPackets): self
    {
        $this->initialized['rxPackets'] = true;
        $this->rxPackets = $rxPackets;

        return $this;
    }

    /**
     * Received errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     */
    public function getRxErrors(): ?int
    {
        return $this->rxErrors;
    }

    /**
     * Received errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     */
    public function setRxErrors(?int $rxErrors): self
    {
        $this->initialized['rxErrors'] = true;
        $this->rxErrors = $rxErrors;

        return $this;
    }

    /**
     * Incoming packets dropped. Windows and Linux.
     */
    public function getRxDropped(): ?int
    {
        return $this->rxDropped;
    }

    /**
     * Incoming packets dropped. Windows and Linux.
     */
    public function setRxDropped(?int $rxDropped): self
    {
        $this->initialized['rxDropped'] = true;
        $this->rxDropped = $rxDropped;

        return $this;
    }

    /**
     * Bytes sent. Windows and Linux.
     */
    public function getTxBytes(): ?int
    {
        return $this->txBytes;
    }

    /**
     * Bytes sent. Windows and Linux.
     */
    public function setTxBytes(?int $txBytes): self
    {
        $this->initialized['txBytes'] = true;
        $this->txBytes = $txBytes;

        return $this;
    }

    /**
     * Packets sent. Windows and Linux.
     */
    public function getTxPackets(): ?int
    {
        return $this->txPackets;
    }

    /**
     * Packets sent. Windows and Linux.
     */
    public function setTxPackets(?int $txPackets): self
    {
        $this->initialized['txPackets'] = true;
        $this->txPackets = $txPackets;

        return $this;
    }

    /**
     * Sent errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     */
    public function getTxErrors(): ?int
    {
        return $this->txErrors;
    }

    /**
     * Sent errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     */
    public function setTxErrors(?int $txErrors): self
    {
        $this->initialized['txErrors'] = true;
        $this->txErrors = $txErrors;

        return $this;
    }

    /**
     * Outgoing packets dropped. Windows and Linux.
     */
    public function getTxDropped(): ?int
    {
        return $this->txDropped;
    }

    /**
     * Outgoing packets dropped. Windows and Linux.
     */
    public function setTxDropped(?int $txDropped): self
    {
        $this->initialized['txDropped'] = true;
        $this->txDropped = $txDropped;

        return $this;
    }

    /**
     * Endpoint ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getEndpointId(): ?string
    {
        return $this->endpointId;
    }

    /**
     * Endpoint ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setEndpointId(?string $endpointId): self
    {
        $this->initialized['endpointId'] = true;
        $this->endpointId = $endpointId;

        return $this;
    }

    /**
     * Instance ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getInstanceId(): ?string
    {
        return $this->instanceId;
    }

    /**
     * Instance ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setInstanceId(?string $instanceId): self
    {
        $this->initialized['instanceId'] = true;
        $this->instanceId = $instanceId;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['rxBytes' => ['rx_bytes', 'getRxBytes', 'setRxBytes'], 'rxPackets' => ['rx_packets', 'getRxPackets', 'setRxPackets'], 'rxErrors' => ['rx_errors', 'getRxErrors', 'setRxErrors'], 'rxDropped' => ['rx_dropped', 'getRxDropped', 'setRxDropped'], 'txBytes' => ['tx_bytes', 'getTxBytes', 'setTxBytes'], 'txPackets' => ['tx_packets', 'getTxPackets', 'setTxPackets'], 'txErrors' => ['tx_errors', 'getTxErrors', 'setTxErrors'], 'txDropped' => ['tx_dropped', 'getTxDropped', 'setTxDropped'], 'endpointId' => ['endpoint_id', 'getEndpointId', 'setEndpointId'], 'instanceId' => ['instance_id', 'getInstanceId', 'setInstanceId']];
    }
}
