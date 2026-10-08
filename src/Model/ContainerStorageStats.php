<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerStorageStats implements AdditionalPropertiesInterface
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
     * @var int|null
     */
    protected $readCountNormalized;
    /**
     * @var int|null
     */
    protected $readSizeBytes;
    /**
     * @var int|null
     */
    protected $writeCountNormalized;
    /**
     * @var int|null
     */
    protected $writeSizeBytes;

    public function getReadCountNormalized(): ?int
    {
        return $this->readCountNormalized;
    }

    public function setReadCountNormalized(?int $readCountNormalized): self
    {
        $this->initialized['readCountNormalized'] = true;
        $this->readCountNormalized = $readCountNormalized;

        return $this;
    }

    public function getReadSizeBytes(): ?int
    {
        return $this->readSizeBytes;
    }

    public function setReadSizeBytes(?int $readSizeBytes): self
    {
        $this->initialized['readSizeBytes'] = true;
        $this->readSizeBytes = $readSizeBytes;

        return $this;
    }

    public function getWriteCountNormalized(): ?int
    {
        return $this->writeCountNormalized;
    }

    public function setWriteCountNormalized(?int $writeCountNormalized): self
    {
        $this->initialized['writeCountNormalized'] = true;
        $this->writeCountNormalized = $writeCountNormalized;

        return $this;
    }

    public function getWriteSizeBytes(): ?int
    {
        return $this->writeSizeBytes;
    }

    public function setWriteSizeBytes(?int $writeSizeBytes): self
    {
        $this->initialized['writeSizeBytes'] = true;
        $this->writeSizeBytes = $writeSizeBytes;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['readCountNormalized' => ['read_count_normalized', 'getReadCountNormalized', 'setReadCountNormalized'], 'readSizeBytes' => ['read_size_bytes', 'getReadSizeBytes', 'setReadSizeBytes'], 'writeCountNormalized' => ['write_count_normalized', 'getWriteCountNormalized', 'setWriteCountNormalized'], 'writeSizeBytes' => ['write_size_bytes', 'getWriteSizeBytes', 'setWriteSizeBytes']];
    }
}
