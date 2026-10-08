<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageManifestSummarySize implements AdditionalPropertiesInterface
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
     * Total is the total size (in bytes) of all the locally present
     * data (both distributable and non-distributable) that's related to
     * this manifest and its children.
     * This equal to the sum of [Content] size AND all the sizes in the
     * [Size] struct present in the Kind-specific data struct.
     * For example, for an image kind (Kind == "image")
     * this would include the size of the image content and unpacked
     * image snapshots ([Size.Content] + [ImageData.Size.Unpacked]).
     *
     * @var int|null
     */
    protected $total;
    /**
     * Content is the size (in bytes) of all the locally present
     * content in the content store (e.g. image config, layers)
     * referenced by this manifest and its children.
     * This only includes blobs in the content store.
     *
     * @var int|null
     */
    protected $content;

    /**
     * Total is the total size (in bytes) of all the locally present
     * data (both distributable and non-distributable) that's related to
     * this manifest and its children.
     * This equal to the sum of [Content] size AND all the sizes in the
     * [Size] struct present in the Kind-specific data struct.
     * For example, for an image kind (Kind == "image")
     * this would include the size of the image content and unpacked
     * image snapshots ([Size.Content] + [ImageData.Size.Unpacked]).
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * Total is the total size (in bytes) of all the locally present
     * data (both distributable and non-distributable) that's related to
     * this manifest and its children.
     * This equal to the sum of [Content] size AND all the sizes in the
     * [Size] struct present in the Kind-specific data struct.
     * For example, for an image kind (Kind == "image")
     * this would include the size of the image content and unpacked
     * image snapshots ([Size.Content] + [ImageData.Size.Unpacked]).
     */
    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;

        return $this;
    }

    /**
     * Content is the size (in bytes) of all the locally present
     * content in the content store (e.g. image config, layers)
     * referenced by this manifest and its children.
     * This only includes blobs in the content store.
     */
    public function getContent(): ?int
    {
        return $this->content;
    }

    /**
     * Content is the size (in bytes) of all the locally present
     * content in the content store (e.g. image config, layers)
     * referenced by this manifest and its children.
     * This only includes blobs in the content store.
     */
    public function setContent(?int $content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['total' => ['Total', 'getTotal', 'setTotal'], 'content' => ['Content', 'getContent', 'setContent']];
    }
}
