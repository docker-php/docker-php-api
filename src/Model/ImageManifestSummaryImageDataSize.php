<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageManifestSummaryImageDataSize implements AdditionalPropertiesInterface
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
     * Unpacked is the size (in bytes) of the locally unpacked
     * (uncompressed) image content that's directly usable by the containers
     * running this image.
     * It's independent of the distributable content - e.g.
     * the image might still have an unpacked data that's still used by
     * some container even when the distributable/compressed content is
     * already gone.
     *
     * @var int|null
     */
    protected $unpacked;

    /**
     * Unpacked is the size (in bytes) of the locally unpacked
     * (uncompressed) image content that's directly usable by the containers
     * running this image.
     * It's independent of the distributable content - e.g.
     * the image might still have an unpacked data that's still used by
     * some container even when the distributable/compressed content is
     * already gone.
     */
    public function getUnpacked(): ?int
    {
        return $this->unpacked;
    }

    /**
     * Unpacked is the size (in bytes) of the locally unpacked
     * (uncompressed) image content that's directly usable by the containers
     * running this image.
     * It's independent of the distributable content - e.g.
     * the image might still have an unpacked data that's still used by
     * some container even when the distributable/compressed content is
     * already gone.
     */
    public function setUnpacked(?int $unpacked): self
    {
        $this->initialized['unpacked'] = true;
        $this->unpacked = $unpacked;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['unpacked' => ['Unpacked', 'getUnpacked', 'setUnpacked']];
    }
}
