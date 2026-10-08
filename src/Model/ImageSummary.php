<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageSummary implements AdditionalPropertiesInterface
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
     * ID is the content-addressable ID of an image.
     *
     * This identifier is a content-addressable digest calculated from the
     * image's configuration (which includes the digests of layers used by
     * the image).
     *
     * Note that this digest differs from the `RepoDigests` below, which
     * holds digests of image manifests that reference the image.
     *
     * @var string|null
     */
    protected $id;
    /**
     * ID of the parent image.
     *
     * Depending on how the image was created, this field may be empty and
     * is only set for images that were built/created locally. This field
     * is empty if the image was pulled from an image registry.
     *
     * @var string|null
     */
    protected $parentId;
    /**
     * List of image names/tags in the local image cache that reference this
     * image.
     *
     * Multiple image tags can refer to the same image, and this list may be
     * empty if no tags reference the image, in which case the image is
     * "untagged", in which case it can still be referenced by its ID.
     *
     * @var list<string>|null
     */
    protected $repoTags;
    /**
     * List of content-addressable digests of locally available image manifests
     * that the image is referenced from. Multiple manifests can refer to the
     * same image.
     *
     * These digests are usually only available if the image was either pulled
     * from a registry, or if the image was pushed to a registry, which is when
     * the manifest is generated and its digest calculated.
     *
     * @var list<string>|null
     */
    protected $repoDigests;
    /**
     * Date and time at which the image was created as a Unix timestamp
     * (number of seconds since EPOCH).
     *
     * @var int|null
     */
    protected $created;
    /**
     * Total size of the image including all layers it is composed of.
     *
     * @var int|null
     */
    protected $size;
    /**
     * Total size of image layers that are shared between this image and other
     * images.
     *
     * This size is not calculated by default. `-1` indicates that the value
     * has not been set / calculated.
     *
     * @var int|null
     */
    protected $sharedSize;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>|null
     */
    protected $labels;
    /**
     * Number of containers using this image. Includes both stopped and running
     * containers.
     *
     * This size is not calculated by default, and depends on which API endpoint
     * is used. `-1` indicates that the value has not been set / calculated.
     *
     * @var int|null
     */
    protected $containers;
    /**
     * Manifests is a list of manifests available in this image.
     * It provides a more detailed view of the platform-specific image manifests
     * or other image-attached data like build attestations.
     *
     * WARNING: This is experimental and may change at any time without any backward
     * compatibility.
     *
     * @var list<ImageManifestSummary>|null
     */
    protected $manifests;

    /**
     * ID is the content-addressable ID of an image.
     *
     * This identifier is a content-addressable digest calculated from the
     * image's configuration (which includes the digests of layers used by
     * the image).
     *
     * Note that this digest differs from the `RepoDigests` below, which
     * holds digests of image manifests that reference the image.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * ID is the content-addressable ID of an image.
     *
     * This identifier is a content-addressable digest calculated from the
     * image's configuration (which includes the digests of layers used by
     * the image).
     *
     * Note that this digest differs from the `RepoDigests` below, which
     * holds digests of image manifests that reference the image.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * ID of the parent image.
     *
     * Depending on how the image was created, this field may be empty and
     * is only set for images that were built/created locally. This field
     * is empty if the image was pulled from an image registry.
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * ID of the parent image.
     *
     * Depending on how the image was created, this field may be empty and
     * is only set for images that were built/created locally. This field
     * is empty if the image was pulled from an image registry.
     */
    public function setParentId(?string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * List of image names/tags in the local image cache that reference this
     * image.
     *
     * Multiple image tags can refer to the same image, and this list may be
     * empty if no tags reference the image, in which case the image is
     * "untagged", in which case it can still be referenced by its ID.
     *
     * @return list<string>|null
     */
    public function getRepoTags(): ?array
    {
        return $this->repoTags;
    }

    /**
     * List of image names/tags in the local image cache that reference this
     * image.
     *
     * Multiple image tags can refer to the same image, and this list may be
     * empty if no tags reference the image, in which case the image is
     * "untagged", in which case it can still be referenced by its ID.
     *
     * @param list<string>|null $repoTags
     */
    public function setRepoTags(?array $repoTags): self
    {
        $this->initialized['repoTags'] = true;
        $this->repoTags = $repoTags;

        return $this;
    }

    /**
     * List of content-addressable digests of locally available image manifests
     * that the image is referenced from. Multiple manifests can refer to the
     * same image.
     *
     * These digests are usually only available if the image was either pulled
     * from a registry, or if the image was pushed to a registry, which is when
     * the manifest is generated and its digest calculated.
     *
     * @return list<string>|null
     */
    public function getRepoDigests(): ?array
    {
        return $this->repoDigests;
    }

    /**
     * List of content-addressable digests of locally available image manifests
     * that the image is referenced from. Multiple manifests can refer to the
     * same image.
     *
     * These digests are usually only available if the image was either pulled
     * from a registry, or if the image was pushed to a registry, which is when
     * the manifest is generated and its digest calculated.
     *
     * @param list<string>|null $repoDigests
     */
    public function setRepoDigests(?array $repoDigests): self
    {
        $this->initialized['repoDigests'] = true;
        $this->repoDigests = $repoDigests;

        return $this;
    }

    /**
     * Date and time at which the image was created as a Unix timestamp
     * (number of seconds since EPOCH).
     */
    public function getCreated(): ?int
    {
        return $this->created;
    }

    /**
     * Date and time at which the image was created as a Unix timestamp
     * (number of seconds since EPOCH).
     */
    public function setCreated(?int $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * Total size of the image including all layers it is composed of.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * Total size of the image including all layers it is composed of.
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Total size of image layers that are shared between this image and other
     * images.
     *
     * This size is not calculated by default. `-1` indicates that the value
     * has not been set / calculated.
     */
    public function getSharedSize(): ?int
    {
        return $this->sharedSize;
    }

    /**
     * Total size of image layers that are shared between this image and other
     * images.
     *
     * This size is not calculated by default. `-1` indicates that the value
     * has not been set / calculated.
     */
    public function setSharedSize(?int $sharedSize): self
    {
        $this->initialized['sharedSize'] = true;
        $this->sharedSize = $sharedSize;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
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
     * Number of containers using this image. Includes both stopped and running
     * containers.
     *
     * This size is not calculated by default, and depends on which API endpoint
     * is used. `-1` indicates that the value has not been set / calculated.
     */
    public function getContainers(): ?int
    {
        return $this->containers;
    }

    /**
     * Number of containers using this image. Includes both stopped and running
     * containers.
     *
     * This size is not calculated by default, and depends on which API endpoint
     * is used. `-1` indicates that the value has not been set / calculated.
     */
    public function setContainers(?int $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    /**
     * Manifests is a list of manifests available in this image.
     * It provides a more detailed view of the platform-specific image manifests
     * or other image-attached data like build attestations.
     *
     * WARNING: This is experimental and may change at any time without any backward
     * compatibility.
     *
     * @return list<ImageManifestSummary>|null
     */
    public function getManifests(): ?array
    {
        return $this->manifests;
    }

    /**
     * Manifests is a list of manifests available in this image.
     * It provides a more detailed view of the platform-specific image manifests
     * or other image-attached data like build attestations.
     *
     * WARNING: This is experimental and may change at any time without any backward
     * compatibility.
     *
     * @param list<ImageManifestSummary>|null $manifests
     */
    public function setManifests(?array $manifests): self
    {
        $this->initialized['manifests'] = true;
        $this->manifests = $manifests;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['Id', 'getId', 'setId'], 'parentId' => ['ParentId', 'getParentId', 'setParentId'], 'repoTags' => ['RepoTags', 'getRepoTags', 'setRepoTags'], 'repoDigests' => ['RepoDigests', 'getRepoDigests', 'setRepoDigests'], 'created' => ['Created', 'getCreated', 'setCreated'], 'size' => ['Size', 'getSize', 'setSize'], 'sharedSize' => ['SharedSize', 'getSharedSize', 'setSharedSize'], 'labels' => ['Labels', 'getLabels', 'setLabels'], 'containers' => ['Containers', 'getContainers', 'setContainers'], 'manifests' => ['Manifests', 'getManifests', 'setManifests']];
    }
}
