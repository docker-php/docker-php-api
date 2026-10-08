<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class SignatureTimestamp implements AdditionalPropertiesInterface
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
     * SignatureTimestampType is the type of timestamp used in the signature.
     *
     * @var string|null
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $uRI;
    /**
     * @var \DateTimeInterface|null
     */
    protected $timestamp;

    /**
     * SignatureTimestampType is the type of timestamp used in the signature.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * SignatureTimestampType is the type of timestamp used in the signature.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function getURI(): ?string
    {
        return $this->uRI;
    }

    public function setURI(?string $uRI): self
    {
        $this->initialized['uRI'] = true;
        $this->uRI = $uRI;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(?\DateTimeInterface $timestamp): self
    {
        $this->initialized['timestamp'] = true;
        $this->timestamp = $timestamp;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['Type', 'getType', 'setType'], 'uRI' => ['URI', 'getURI', 'setURI'], 'timestamp' => ['Timestamp', 'getTimestamp', 'setTimestamp']];
    }
}
