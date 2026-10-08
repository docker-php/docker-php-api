<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageInspect implements AdditionalPropertiesInterface
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
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor|null
     */
    protected $descriptor;
    /**
     * Manifests is a list of image manifests available in this image. It
     * provides a more detailed view of the platform-specific image manifests or
     * other image-attached data like build attestations.
     *
     * Only available if the daemon provides a multi-platform image store
     * and the `manifests` option is set in the inspect request.
     *
     * WARNING: This is experimental and may change at any time without any backward
     * compatibility.
     *
     * @var list<ImageManifestSummary>|null
     */
    protected $manifests;
    /**
     * Identity holds information about the identity and origin of the image.
     * This is trusted information verified by the daemon and cannot be modified
     * by tagging an image to a different name.
     *
     * @var Identity|null
     */
    protected $identity;
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
     * Optional message that was set when committing or importing the image.
     *
     * @var string|null
     */
    protected $comment;
    /**
     * Date and time at which the image was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if present in the image,
     * and omitted otherwise.
     *
     * @var string|null
     */
    protected $created;
    /**
     * Name of the author that was specified when committing the image, or as
     * specified through MAINTAINER (deprecated) in the Dockerfile.
     *
     * @var string|null
     */
    protected $author;
    /**
     * Configuration of the image. These fields are used as defaults
     * when starting a container from the image.
     *
     * @var ImageConfig|null
     */
    protected $config;
    /**
     * Hardware CPU architecture that the image runs on.
     *
     * @var string|null
     */
    protected $architecture;
    /**
     * CPU architecture variant (presently ARM-only).
     *
     * @var string|null
     */
    protected $variant;
    /**
     * Operating System the image is built to run on.
     *
     * @var string|null
     */
    protected $os;
    /**
     * Operating System version the image is built to run on (especially
     * for Windows).
     *
     * @var string|null
     */
    protected $osVersion;
    /**
     * Total size of the image variant, including all layers it is composed of.
     *
     * For multi-platform images, this is the size of the platform variant
     * selected by the `platform` query parameter. If no platform is specified,
     * the daemon selects a platform as described in the `platform` parameter.
     *
     * When using the containerd image store, this includes both the image content
     * that's present locally and the unpacked snapshot data for the selected
     * variant.
     *
     * Image data may be shared between images, so this size does not indicate
     * how much space would be reclaimed by deleting the image.
     *
     * @var int|null
     */
    protected $size;
    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     *
     * @var DriverData|null
     */
    protected $graphDriver;
    /**
     * Information about the image's RootFS, including the layer IDs.
     *
     * @var ImageInspectRootFS|null
     */
    protected $rootFS;
    /**
     * Additional metadata of the image in the local cache. This information
     * is local to the daemon, and not part of the image itself.
     *
     * @var ImageInspectMetadata|null
     */
    protected $metadata;

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
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function getDescriptor(): ?OCIDescriptor
    {
        return $this->descriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function setDescriptor(?OCIDescriptor $descriptor): self
    {
        $this->initialized['descriptor'] = true;
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Manifests is a list of image manifests available in this image. It
     * provides a more detailed view of the platform-specific image manifests or
     * other image-attached data like build attestations.
     *
     * Only available if the daemon provides a multi-platform image store
     * and the `manifests` option is set in the inspect request.
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
     * Manifests is a list of image manifests available in this image. It
     * provides a more detailed view of the platform-specific image manifests or
     * other image-attached data like build attestations.
     *
     * Only available if the daemon provides a multi-platform image store
     * and the `manifests` option is set in the inspect request.
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

    /**
     * Identity holds information about the identity and origin of the image.
     * This is trusted information verified by the daemon and cannot be modified
     * by tagging an image to a different name.
     */
    public function getIdentity(): ?Identity
    {
        return $this->identity;
    }

    /**
     * Identity holds information about the identity and origin of the image.
     * This is trusted information verified by the daemon and cannot be modified
     * by tagging an image to a different name.
     */
    public function setIdentity(?Identity $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;

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
     * Optional message that was set when committing or importing the image.
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Optional message that was set when committing or importing the image.
     */
    public function setComment(?string $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;

        return $this;
    }

    /**
     * Date and time at which the image was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if present in the image,
     * and omitted otherwise.
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * Date and time at which the image was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if present in the image,
     * and omitted otherwise.
     */
    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * Name of the author that was specified when committing the image, or as
     * specified through MAINTAINER (deprecated) in the Dockerfile.
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Name of the author that was specified when committing the image, or as
     * specified through MAINTAINER (deprecated) in the Dockerfile.
     */
    public function setAuthor(?string $author): self
    {
        $this->initialized['author'] = true;
        $this->author = $author;

        return $this;
    }

    /**
     * Configuration of the image. These fields are used as defaults
     * when starting a container from the image.
     */
    public function getConfig(): ?ImageConfig
    {
        return $this->config;
    }

    /**
     * Configuration of the image. These fields are used as defaults
     * when starting a container from the image.
     */
    public function setConfig(?ImageConfig $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    /**
     * Hardware CPU architecture that the image runs on.
     */
    public function getArchitecture(): ?string
    {
        return $this->architecture;
    }

    /**
     * Hardware CPU architecture that the image runs on.
     */
    public function setArchitecture(?string $architecture): self
    {
        $this->initialized['architecture'] = true;
        $this->architecture = $architecture;

        return $this;
    }

    /**
     * CPU architecture variant (presently ARM-only).
     */
    public function getVariant(): ?string
    {
        return $this->variant;
    }

    /**
     * CPU architecture variant (presently ARM-only).
     */
    public function setVariant(?string $variant): self
    {
        $this->initialized['variant'] = true;
        $this->variant = $variant;

        return $this;
    }

    /**
     * Operating System the image is built to run on.
     */
    public function getOs(): ?string
    {
        return $this->os;
    }

    /**
     * Operating System the image is built to run on.
     */
    public function setOs(?string $os): self
    {
        $this->initialized['os'] = true;
        $this->os = $os;

        return $this;
    }

    /**
     * Operating System version the image is built to run on (especially
     * for Windows).
     */
    public function getOsVersion(): ?string
    {
        return $this->osVersion;
    }

    /**
     * Operating System version the image is built to run on (especially
     * for Windows).
     */
    public function setOsVersion(?string $osVersion): self
    {
        $this->initialized['osVersion'] = true;
        $this->osVersion = $osVersion;

        return $this;
    }

    /**
     * Total size of the image variant, including all layers it is composed of.
     *
     * For multi-platform images, this is the size of the platform variant
     * selected by the `platform` query parameter. If no platform is specified,
     * the daemon selects a platform as described in the `platform` parameter.
     *
     * When using the containerd image store, this includes both the image content
     * that's present locally and the unpacked snapshot data for the selected
     * variant.
     *
     * Image data may be shared between images, so this size does not indicate
     * how much space would be reclaimed by deleting the image.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * Total size of the image variant, including all layers it is composed of.
     *
     * For multi-platform images, this is the size of the platform variant
     * selected by the `platform` query parameter. If no platform is specified,
     * the daemon selects a platform as described in the `platform` parameter.
     *
     * When using the containerd image store, this includes both the image content
     * that's present locally and the unpacked snapshot data for the selected
     * variant.
     *
     * Image data may be shared between images, so this size does not indicate
     * how much space would be reclaimed by deleting the image.
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     */
    public function getGraphDriver(): ?DriverData
    {
        return $this->graphDriver;
    }

    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     */
    public function setGraphDriver(?DriverData $graphDriver): self
    {
        $this->initialized['graphDriver'] = true;
        $this->graphDriver = $graphDriver;

        return $this;
    }

    /**
     * Information about the image's RootFS, including the layer IDs.
     */
    public function getRootFS(): ?ImageInspectRootFS
    {
        return $this->rootFS;
    }

    /**
     * Information about the image's RootFS, including the layer IDs.
     */
    public function setRootFS(?ImageInspectRootFS $rootFS): self
    {
        $this->initialized['rootFS'] = true;
        $this->rootFS = $rootFS;

        return $this;
    }

    /**
     * Additional metadata of the image in the local cache. This information
     * is local to the daemon, and not part of the image itself.
     */
    public function getMetadata(): ?ImageInspectMetadata
    {
        return $this->metadata;
    }

    /**
     * Additional metadata of the image in the local cache. This information
     * is local to the daemon, and not part of the image itself.
     */
    public function setMetadata(?ImageInspectMetadata $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['Id', 'getId', 'setId'], 'descriptor' => ['Descriptor', 'getDescriptor', 'setDescriptor'], 'manifests' => ['Manifests', 'getManifests', 'setManifests'], 'identity' => ['Identity', 'getIdentity', 'setIdentity'], 'repoTags' => ['RepoTags', 'getRepoTags', 'setRepoTags'], 'repoDigests' => ['RepoDigests', 'getRepoDigests', 'setRepoDigests'], 'comment' => ['Comment', 'getComment', 'setComment'], 'created' => ['Created', 'getCreated', 'setCreated'], 'author' => ['Author', 'getAuthor', 'setAuthor'], 'config' => ['Config', 'getConfig', 'setConfig'], 'architecture' => ['Architecture', 'getArchitecture', 'setArchitecture'], 'variant' => ['Variant', 'getVariant', 'setVariant'], 'os' => ['Os', 'getOs', 'setOs'], 'osVersion' => ['OsVersion', 'getOsVersion', 'setOsVersion'], 'size' => ['Size', 'getSize', 'setSize'], 'graphDriver' => ['GraphDriver', 'getGraphDriver', 'setGraphDriver'], 'rootFS' => ['RootFS', 'getRootFS', 'setRootFS'], 'metadata' => ['Metadata', 'getMetadata', 'setMetadata']];
    }
}
