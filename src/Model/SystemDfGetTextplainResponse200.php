<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class SystemDfGetTextplainResponse200 implements AdditionalPropertiesInterface
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
     * represents system data usage for image resources.
     *
     * @var ImagesDiskUsage|null
     */
    protected $imageUsage;
    /**
     * represents system data usage information for container resources.
     *
     * @var ContainersDiskUsage|null
     */
    protected $containerUsage;
    /**
     * represents system data usage for volume resources.
     *
     * @var VolumesDiskUsage|null
     */
    protected $volumeUsage;
    /**
     * represents system data usage for build cache resources.
     *
     * @var BuildCacheDiskUsage|null
     */
    protected $buildCacheUsage;

    /**
     * represents system data usage for image resources.
     */
    public function getImageUsage(): ?ImagesDiskUsage
    {
        return $this->imageUsage;
    }

    /**
     * represents system data usage for image resources.
     */
    public function setImageUsage(?ImagesDiskUsage $imageUsage): self
    {
        $this->initialized['imageUsage'] = true;
        $this->imageUsage = $imageUsage;

        return $this;
    }

    /**
     * represents system data usage information for container resources.
     */
    public function getContainerUsage(): ?ContainersDiskUsage
    {
        return $this->containerUsage;
    }

    /**
     * represents system data usage information for container resources.
     */
    public function setContainerUsage(?ContainersDiskUsage $containerUsage): self
    {
        $this->initialized['containerUsage'] = true;
        $this->containerUsage = $containerUsage;

        return $this;
    }

    /**
     * represents system data usage for volume resources.
     */
    public function getVolumeUsage(): ?VolumesDiskUsage
    {
        return $this->volumeUsage;
    }

    /**
     * represents system data usage for volume resources.
     */
    public function setVolumeUsage(?VolumesDiskUsage $volumeUsage): self
    {
        $this->initialized['volumeUsage'] = true;
        $this->volumeUsage = $volumeUsage;

        return $this;
    }

    /**
     * represents system data usage for build cache resources.
     */
    public function getBuildCacheUsage(): ?BuildCacheDiskUsage
    {
        return $this->buildCacheUsage;
    }

    /**
     * represents system data usage for build cache resources.
     */
    public function setBuildCacheUsage(?BuildCacheDiskUsage $buildCacheUsage): self
    {
        $this->initialized['buildCacheUsage'] = true;
        $this->buildCacheUsage = $buildCacheUsage;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['imageUsage' => ['ImageUsage', 'getImageUsage', 'setImageUsage'], 'containerUsage' => ['ContainerUsage', 'getContainerUsage', 'setContainerUsage'], 'volumeUsage' => ['VolumeUsage', 'getVolumeUsage', 'setVolumeUsage'], 'buildCacheUsage' => ['BuildCacheUsage', 'getBuildCacheUsage', 'setBuildCacheUsage']];
    }
}
