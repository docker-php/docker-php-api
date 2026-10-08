<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageManifestSummaryImageData implements AdditionalPropertiesInterface
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
     * Describes the platform which the image in the manifest runs on, as defined
     * in the [OCI Image Index Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/image-index.md).
     *
     * @var OCIPlatform|null
     */
    protected $platform;
    /**
     * The IDs of the containers that are using this image.
     *
     * @var list<string>|null
     */
    protected $containers;
    /**
     * @var ImageManifestSummaryImageDataSize|null
     */
    protected $size;

    /**
     * Describes the platform which the image in the manifest runs on, as defined
     * in the [OCI Image Index Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/image-index.md).
     */
    public function getPlatform(): ?OCIPlatform
    {
        return $this->platform;
    }

    /**
     * Describes the platform which the image in the manifest runs on, as defined
     * in the [OCI Image Index Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/image-index.md).
     */
    public function setPlatform(?OCIPlatform $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;

        return $this;
    }

    /**
     * The IDs of the containers that are using this image.
     *
     * @return list<string>|null
     */
    public function getContainers(): ?array
    {
        return $this->containers;
    }

    /**
     * The IDs of the containers that are using this image.
     *
     * @param list<string>|null $containers
     */
    public function setContainers(?array $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    public function getSize(): ?ImageManifestSummaryImageDataSize
    {
        return $this->size;
    }

    public function setSize(?ImageManifestSummaryImageDataSize $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['platform' => ['Platform', 'getPlatform', 'setPlatform'], 'containers' => ['Containers', 'getContainers', 'setContainers'], 'size' => ['Size', 'getSize', 'setSize']];
    }
}
