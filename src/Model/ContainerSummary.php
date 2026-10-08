<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerSummary implements AdditionalPropertiesInterface
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
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     *
     * @var string|null
     */
    protected $id;
    /**
     * The names associated with this container. Most containers have a single
     * name, but when using legacy "links", the container can have multiple
     * names.
     *
     * For historic reasons, names are prefixed with a forward-slash (`/`).
     *
     * @var list<string>|null
     */
    protected $names;
    /**
     * The name or ID of the image used to create the container.
     *
     * This field shows the image reference as was specified when creating the container,
     * which can be in its canonical form (e.g., `docker.io/library/ubuntu:latest`
     * or `docker.io/library/ubuntu@sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`),
     * short form (e.g., `ubuntu:latest`)), or the ID(-prefix) of the image (e.g., `72297848456d`).
     *
     * The content of this field can be updated at runtime if the image used to
     * create the container is untagged, in which case the field is updated to
     * contain the the image ID (digest) it was resolved to in its canonical,
     * non-truncated form (e.g., `sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`).
     *
     * @var string|null
     */
    protected $image;
    /**
     * The ID (digest) of the image that this container was created from.
     *
     * @var string|null
     */
    protected $imageID;
    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor|null
     */
    protected $imageManifestDescriptor;
    /**
     * Command to run when starting the container.
     *
     * @var string|null
     */
    protected $command;
    /**
     * Date and time at which the container was created as a Unix timestamp
     * (number of seconds since EPOCH).
     *
     * @var int|null
     */
    protected $created;
    /**
     * Port-mappings for the container.
     *
     * @var list<Port>|null
     */
    protected $ports;
    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     *
     * @var int|null
     */
    protected $sizeRw;
    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     *
     * @var int|null
     */
    protected $sizeRootFs;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>|null
     */
    protected $labels;
    /**
     * The state of this container.
     *
     * @var string|null
     */
    protected $state;
    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     *
     * @var string|null
     */
    protected $status;
    /**
     * Summary of host-specific runtime information of the container. This
     * is a reduced set of information in the container's "HostConfig" as
     * available in the container "inspect" response.
     *
     * @var ContainerSummaryHostConfig|null
     */
    protected $hostConfig;
    /**
     * Summary of the container's network settings.
     *
     * @var ContainerSummaryNetworkSettings|null
     */
    protected $networkSettings;
    /**
     * List of mounts used by the container.
     *
     * @var list<MountPoint>|null
     */
    protected $mounts;

    /**
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The names associated with this container. Most containers have a single
     * name, but when using legacy "links", the container can have multiple
     * names.
     *
     * For historic reasons, names are prefixed with a forward-slash (`/`).
     *
     * @return list<string>|null
     */
    public function getNames(): ?array
    {
        return $this->names;
    }

    /**
     * The names associated with this container. Most containers have a single
     * name, but when using legacy "links", the container can have multiple
     * names.
     *
     * For historic reasons, names are prefixed with a forward-slash (`/`).
     *
     * @param list<string>|null $names
     */
    public function setNames(?array $names): self
    {
        $this->initialized['names'] = true;
        $this->names = $names;

        return $this;
    }

    /**
     * The name or ID of the image used to create the container.
     *
     * This field shows the image reference as was specified when creating the container,
     * which can be in its canonical form (e.g., `docker.io/library/ubuntu:latest`
     * or `docker.io/library/ubuntu@sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`),
     * short form (e.g., `ubuntu:latest`)), or the ID(-prefix) of the image (e.g., `72297848456d`).
     *
     * The content of this field can be updated at runtime if the image used to
     * create the container is untagged, in which case the field is updated to
     * contain the the image ID (digest) it was resolved to in its canonical,
     * non-truncated form (e.g., `sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`).
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * The name or ID of the image used to create the container.
     *
     * This field shows the image reference as was specified when creating the container,
     * which can be in its canonical form (e.g., `docker.io/library/ubuntu:latest`
     * or `docker.io/library/ubuntu@sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`),
     * short form (e.g., `ubuntu:latest`)), or the ID(-prefix) of the image (e.g., `72297848456d`).
     *
     * The content of this field can be updated at runtime if the image used to
     * create the container is untagged, in which case the field is updated to
     * contain the the image ID (digest) it was resolved to in its canonical,
     * non-truncated form (e.g., `sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`).
     */
    public function setImage(?string $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;

        return $this;
    }

    /**
     * The ID (digest) of the image that this container was created from.
     */
    public function getImageID(): ?string
    {
        return $this->imageID;
    }

    /**
     * The ID (digest) of the image that this container was created from.
     */
    public function setImageID(?string $imageID): self
    {
        $this->initialized['imageID'] = true;
        $this->imageID = $imageID;

        return $this;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function getImageManifestDescriptor(): ?OCIDescriptor
    {
        return $this->imageManifestDescriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function setImageManifestDescriptor(?OCIDescriptor $imageManifestDescriptor): self
    {
        $this->initialized['imageManifestDescriptor'] = true;
        $this->imageManifestDescriptor = $imageManifestDescriptor;

        return $this;
    }

    /**
     * Command to run when starting the container.
     */
    public function getCommand(): ?string
    {
        return $this->command;
    }

    /**
     * Command to run when starting the container.
     */
    public function setCommand(?string $command): self
    {
        $this->initialized['command'] = true;
        $this->command = $command;

        return $this;
    }

    /**
     * Date and time at which the container was created as a Unix timestamp
     * (number of seconds since EPOCH).
     */
    public function getCreated(): ?int
    {
        return $this->created;
    }

    /**
     * Date and time at which the container was created as a Unix timestamp
     * (number of seconds since EPOCH).
     */
    public function setCreated(?int $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * Port-mappings for the container.
     *
     * @return list<Port>|null
     */
    public function getPorts(): ?array
    {
        return $this->ports;
    }

    /**
     * Port-mappings for the container.
     *
     * @param list<Port>|null $ports
     */
    public function setPorts(?array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }

    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function getSizeRw(): ?int
    {
        return $this->sizeRw;
    }

    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function setSizeRw(?int $sizeRw): self
    {
        $this->initialized['sizeRw'] = true;
        $this->sizeRw = $sizeRw;

        return $this;
    }

    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function getSizeRootFs(): ?int
    {
        return $this->sizeRootFs;
    }

    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function setSizeRootFs(?int $sizeRootFs): self
    {
        $this->initialized['sizeRootFs'] = true;
        $this->sizeRootFs = $sizeRootFs;

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
     * The state of this container.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * The state of this container.
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Summary of host-specific runtime information of the container. This
     * is a reduced set of information in the container's "HostConfig" as
     * available in the container "inspect" response.
     */
    public function getHostConfig(): ?ContainerSummaryHostConfig
    {
        return $this->hostConfig;
    }

    /**
     * Summary of host-specific runtime information of the container. This
     * is a reduced set of information in the container's "HostConfig" as
     * available in the container "inspect" response.
     */
    public function setHostConfig(?ContainerSummaryHostConfig $hostConfig): self
    {
        $this->initialized['hostConfig'] = true;
        $this->hostConfig = $hostConfig;

        return $this;
    }

    /**
     * Summary of the container's network settings.
     */
    public function getNetworkSettings(): ?ContainerSummaryNetworkSettings
    {
        return $this->networkSettings;
    }

    /**
     * Summary of the container's network settings.
     */
    public function setNetworkSettings(?ContainerSummaryNetworkSettings $networkSettings): self
    {
        $this->initialized['networkSettings'] = true;
        $this->networkSettings = $networkSettings;

        return $this;
    }

    /**
     * List of mounts used by the container.
     *
     * @return list<MountPoint>|null
     */
    public function getMounts(): ?array
    {
        return $this->mounts;
    }

    /**
     * List of mounts used by the container.
     *
     * @param list<MountPoint>|null $mounts
     */
    public function setMounts(?array $mounts): self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['Id', 'getId', 'setId'], 'names' => ['Names', 'getNames', 'setNames'], 'image' => ['Image', 'getImage', 'setImage'], 'imageID' => ['ImageID', 'getImageID', 'setImageID'], 'imageManifestDescriptor' => ['ImageManifestDescriptor', 'getImageManifestDescriptor', 'setImageManifestDescriptor'], 'command' => ['Command', 'getCommand', 'setCommand'], 'created' => ['Created', 'getCreated', 'setCreated'], 'ports' => ['Ports', 'getPorts', 'setPorts'], 'sizeRw' => ['SizeRw', 'getSizeRw', 'setSizeRw'], 'sizeRootFs' => ['SizeRootFs', 'getSizeRootFs', 'setSizeRootFs'], 'labels' => ['Labels', 'getLabels', 'setLabels'], 'state' => ['State', 'getState', 'setState'], 'status' => ['Status', 'getStatus', 'setStatus'], 'hostConfig' => ['HostConfig', 'getHostConfig', 'setHostConfig'], 'networkSettings' => ['NetworkSettings', 'getNetworkSettings', 'setNetworkSettings'], 'mounts' => ['Mounts', 'getMounts', 'setMounts']];
    }
}
