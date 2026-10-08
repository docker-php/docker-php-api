<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class PortSummary implements AdditionalPropertiesInterface
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
     * Host IP address that the container's port is mapped to.
     *
     * @var string|null
     */
    protected $iP;
    /**
     * Port on the container.
     *
     * @var int|null
     */
    protected $privatePort;
    /**
     * Port exposed on the host.
     *
     * @var int|null
     */
    protected $publicPort;
    /**
     * @var string|null
     */
    protected $type;

    /**
     * Host IP address that the container's port is mapped to.
     */
    public function getIP(): ?string
    {
        return $this->iP;
    }

    /**
     * Host IP address that the container's port is mapped to.
     */
    public function setIP(?string $iP): self
    {
        $this->initialized['iP'] = true;
        $this->iP = $iP;

        return $this;
    }

    /**
     * Port on the container.
     */
    public function getPrivatePort(): ?int
    {
        return $this->privatePort;
    }

    /**
     * Port on the container.
     */
    public function setPrivatePort(?int $privatePort): self
    {
        $this->initialized['privatePort'] = true;
        $this->privatePort = $privatePort;

        return $this;
    }

    /**
     * Port exposed on the host.
     */
    public function getPublicPort(): ?int
    {
        return $this->publicPort;
    }

    /**
     * Port exposed on the host.
     */
    public function setPublicPort(?int $publicPort): self
    {
        $this->initialized['publicPort'] = true;
        $this->publicPort = $publicPort;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['iP' => ['IP', 'getIP', 'setIP'], 'privatePort' => ['PrivatePort', 'getPrivatePort', 'setPrivatePort'], 'publicPort' => ['PublicPort', 'getPublicPort', 'setPublicPort'], 'type' => ['Type', 'getType', 'setType']];
    }
}
