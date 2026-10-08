<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class OCIDescriptor implements AdditionalPropertiesInterface
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
     * The media type of the object this schema refers to.
     *
     * @var string|null
     */
    protected $mediaType;
    /**
     * The digest of the targeted content.
     *
     * @var string|null
     */
    protected $digest;
    /**
     * The size in bytes of the blob.
     *
     * @var int|null
     */
    protected $size;
    /**
     * List of URLs from which this object MAY be downloaded.
     *
     * @var list<string>|null
     */
    protected $urls;
    /**
     * Arbitrary metadata relating to the targeted content.
     *
     * @var array<string, string>|null
     */
    protected $annotations;
    /**
     * Data is an embedding of the targeted content. This is encoded as a base64
     * string when marshalled to JSON (automatically, by encoding/json). If
     * present, Data can be used directly to avoid fetching the targeted content.
     *
     * @var string|null
     */
    protected $data;
    /**
     * Describes the platform which the image in the manifest runs on, as defined
     * in the [OCI Image Index Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/image-index.md).
     *
     * @var OCIPlatform|null
     */
    protected $platform;
    /**
     * ArtifactType is the IANA media type of this artifact.
     *
     * @var string|null
     */
    protected $artifactType;

    /**
     * The media type of the object this schema refers to.
     */
    public function getMediaType(): ?string
    {
        return $this->mediaType;
    }

    /**
     * The media type of the object this schema refers to.
     */
    public function setMediaType(?string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * The digest of the targeted content.
     */
    public function getDigest(): ?string
    {
        return $this->digest;
    }

    /**
     * The digest of the targeted content.
     */
    public function setDigest(?string $digest): self
    {
        $this->initialized['digest'] = true;
        $this->digest = $digest;

        return $this;
    }

    /**
     * The size in bytes of the blob.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * The size in bytes of the blob.
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * List of URLs from which this object MAY be downloaded.
     *
     * @return list<string>|null
     */
    public function getUrls(): ?array
    {
        return $this->urls;
    }

    /**
     * List of URLs from which this object MAY be downloaded.
     *
     * @param list<string>|null $urls
     */
    public function setUrls(?array $urls): self
    {
        $this->initialized['urls'] = true;
        $this->urls = $urls;

        return $this;
    }

    /**
     * Arbitrary metadata relating to the targeted content.
     *
     * @return array<string, string>|null
     */
    public function getAnnotations(): ?iterable
    {
        return $this->annotations;
    }

    /**
     * Arbitrary metadata relating to the targeted content.
     *
     * @param array<string, string>|null $annotations
     */
    public function setAnnotations(?iterable $annotations): self
    {
        $this->initialized['annotations'] = true;
        $this->annotations = $annotations;

        return $this;
    }

    /**
     * Data is an embedding of the targeted content. This is encoded as a base64
     * string when marshalled to JSON (automatically, by encoding/json). If
     * present, Data can be used directly to avoid fetching the targeted content.
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Data is an embedding of the targeted content. This is encoded as a base64
     * string when marshalled to JSON (automatically, by encoding/json). If
     * present, Data can be used directly to avoid fetching the targeted content.
     */
    public function setData(?string $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }

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
     * ArtifactType is the IANA media type of this artifact.
     */
    public function getArtifactType(): ?string
    {
        return $this->artifactType;
    }

    /**
     * ArtifactType is the IANA media type of this artifact.
     */
    public function setArtifactType(?string $artifactType): self
    {
        $this->initialized['artifactType'] = true;
        $this->artifactType = $artifactType;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['mediaType' => ['mediaType', 'getMediaType', 'setMediaType'], 'digest' => ['digest', 'getDigest', 'setDigest'], 'size' => ['size', 'getSize', 'setSize'], 'urls' => ['urls', 'getUrls', 'setUrls'], 'annotations' => ['annotations', 'getAnnotations', 'setAnnotations'], 'data' => ['data', 'getData', 'setData'], 'platform' => ['platform', 'getPlatform', 'setPlatform'], 'artifactType' => ['artifactType', 'getArtifactType', 'setArtifactType']];
    }
}
