<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageManifestSummary implements AdditionalPropertiesInterface
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
     * ID is the content-addressable ID of an image and is the same as the
     * digest of the image manifest.
     *
     * @var string|null
     */
    protected $iD;
    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor|null
     */
    protected $descriptor;
    /**
     * Indicates whether all the child content (image config, layers) is fully available locally.
     *
     * @var bool|null
     */
    protected $available;
    /**
     * @var ImageManifestSummarySize|null
     */
    protected $size;
    /**
     * The kind of the manifest.
     *
     * kind         | description
     * -------------|-----------------------------------------------------------
     * image        | Image manifest that can be used to start a container.
     * attestation  | Attestation manifest produced by the Buildkit builder for a specific image manifest.
     *
     * @var string|null
     */
    protected $kind;
    /**
     * The image data for the image manifest.
     * This field is only populated when Kind is "image".
     *
     * @var ImageManifestSummaryImageData|null
     */
    protected $imageData;
    /**
     * The image data for the attestation manifest.
     * This field is only populated when Kind is "attestation".
     *
     * @var ImageManifestSummaryAttestationData|null
     */
    protected $attestationData;

    /**
     * ID is the content-addressable ID of an image and is the same as the
     * digest of the image manifest.
     */
    public function getID(): ?string
    {
        return $this->iD;
    }

    /**
     * ID is the content-addressable ID of an image and is the same as the
     * digest of the image manifest.
     */
    public function setID(?string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

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
     * Indicates whether all the child content (image config, layers) is fully available locally.
     */
    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    /**
     * Indicates whether all the child content (image config, layers) is fully available locally.
     */
    public function setAvailable(?bool $available): self
    {
        $this->initialized['available'] = true;
        $this->available = $available;

        return $this;
    }

    public function getSize(): ?ImageManifestSummarySize
    {
        return $this->size;
    }

    public function setSize(?ImageManifestSummarySize $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * The kind of the manifest.
     *
     * kind         | description
     * -------------|-----------------------------------------------------------
     * image        | Image manifest that can be used to start a container.
     * attestation  | Attestation manifest produced by the Buildkit builder for a specific image manifest.
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }

    /**
     * The kind of the manifest.
     *
     * kind         | description
     * -------------|-----------------------------------------------------------
     * image        | Image manifest that can be used to start a container.
     * attestation  | Attestation manifest produced by the Buildkit builder for a specific image manifest.
     */
    public function setKind(?string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;

        return $this;
    }

    /**
     * The image data for the image manifest.
     * This field is only populated when Kind is "image".
     */
    public function getImageData(): ?ImageManifestSummaryImageData
    {
        return $this->imageData;
    }

    /**
     * The image data for the image manifest.
     * This field is only populated when Kind is "image".
     */
    public function setImageData(?ImageManifestSummaryImageData $imageData): self
    {
        $this->initialized['imageData'] = true;
        $this->imageData = $imageData;

        return $this;
    }

    /**
     * The image data for the attestation manifest.
     * This field is only populated when Kind is "attestation".
     */
    public function getAttestationData(): ?ImageManifestSummaryAttestationData
    {
        return $this->attestationData;
    }

    /**
     * The image data for the attestation manifest.
     * This field is only populated when Kind is "attestation".
     */
    public function setAttestationData(?ImageManifestSummaryAttestationData $attestationData): self
    {
        $this->initialized['attestationData'] = true;
        $this->attestationData = $attestationData;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['iD' => ['ID', 'getID', 'setID'], 'descriptor' => ['Descriptor', 'getDescriptor', 'setDescriptor'], 'available' => ['Available', 'getAvailable', 'setAvailable'], 'size' => ['Size', 'getSize', 'setSize'], 'kind' => ['Kind', 'getKind', 'setKind'], 'imageData' => ['ImageData', 'getImageData', 'setImageData'], 'attestationData' => ['AttestationData', 'getAttestationData', 'setAttestationData']];
    }
}
