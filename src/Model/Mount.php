<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class Mount implements AdditionalPropertiesInterface
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
     * Container path.
     *
     * @var string|null
     */
    protected $target;
    /**
     * Mount source (e.g. a volume name, a host path). The source cannot be
     * specified when using `Type=tmpfs`. For `Type=bind`, the source path
     * must either exist, or the `CreateMountpoint` must be set to `true` to
     * create the source path on the host if missing.
     *
     * For `Type=npipe`, the pipe must exist prior to creating the container.
     *
     * @var string|null
     */
    protected $source;
    /**
     * The mount type. Available types:
     *
     * - `bind` Mounts a file or directory from the host into the container. The `Source` must exist prior to creating the container.
     * - `cluster` a Swarm cluster volume
     * - `image` Mounts an image.
     * - `npipe` Mounts a named pipe from the host into the container. The `Source` must exist prior to creating the container.
     * - `tmpfs` Create a tmpfs with the given options. The mount `Source` cannot be specified for tmpfs.
     * - `volume` Creates a volume with the given name and options (or uses a pre-existing volume with the same name and options). These are **not** removed when the container is removed.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Whether the mount should be read-only.
     *
     * @var bool|null
     */
    protected $readOnly;
    /**
     * The consistency requirement for the mount: `default`, `consistent`, `cached`, or `delegated`.
     *
     * @var string|null
     */
    protected $consistency;
    /**
     * Optional configuration for the `bind` type.
     *
     * @var MountBindOptions|null
     */
    protected $bindOptions;
    /**
     * Optional configuration for the `volume` type.
     *
     * @var MountVolumeOptions|null
     */
    protected $volumeOptions;
    /**
     * Optional configuration for the `image` type.
     *
     * @var MountImageOptions|null
     */
    protected $imageOptions;
    /**
     * Optional configuration for the `tmpfs` type.
     *
     * @var MountTmpfsOptions|null
     */
    protected $tmpfsOptions;

    /**
     * Container path.
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * Container path.
     */
    public function setTarget(?string $target): self
    {
        $this->initialized['target'] = true;
        $this->target = $target;

        return $this;
    }

    /**
     * Mount source (e.g. a volume name, a host path). The source cannot be
     * specified when using `Type=tmpfs`. For `Type=bind`, the source path
     * must either exist, or the `CreateMountpoint` must be set to `true` to
     * create the source path on the host if missing.
     *
     * For `Type=npipe`, the pipe must exist prior to creating the container.
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Mount source (e.g. a volume name, a host path). The source cannot be
     * specified when using `Type=tmpfs`. For `Type=bind`, the source path
     * must either exist, or the `CreateMountpoint` must be set to `true` to
     * create the source path on the host if missing.
     *
     * For `Type=npipe`, the pipe must exist prior to creating the container.
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * The mount type. Available types:
     *
     * - `bind` Mounts a file or directory from the host into the container. The `Source` must exist prior to creating the container.
     * - `cluster` a Swarm cluster volume
     * - `image` Mounts an image.
     * - `npipe` Mounts a named pipe from the host into the container. The `Source` must exist prior to creating the container.
     * - `tmpfs` Create a tmpfs with the given options. The mount `Source` cannot be specified for tmpfs.
     * - `volume` Creates a volume with the given name and options (or uses a pre-existing volume with the same name and options). These are **not** removed when the container is removed.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * The mount type. Available types:
     *
     * - `bind` Mounts a file or directory from the host into the container. The `Source` must exist prior to creating the container.
     * - `cluster` a Swarm cluster volume
     * - `image` Mounts an image.
     * - `npipe` Mounts a named pipe from the host into the container. The `Source` must exist prior to creating the container.
     * - `tmpfs` Create a tmpfs with the given options. The mount `Source` cannot be specified for tmpfs.
     * - `volume` Creates a volume with the given name and options (or uses a pre-existing volume with the same name and options). These are **not** removed when the container is removed.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Whether the mount should be read-only.
     */
    public function getReadOnly(): ?bool
    {
        return $this->readOnly;
    }

    /**
     * Whether the mount should be read-only.
     */
    public function setReadOnly(?bool $readOnly): self
    {
        $this->initialized['readOnly'] = true;
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * The consistency requirement for the mount: `default`, `consistent`, `cached`, or `delegated`.
     */
    public function getConsistency(): ?string
    {
        return $this->consistency;
    }

    /**
     * The consistency requirement for the mount: `default`, `consistent`, `cached`, or `delegated`.
     */
    public function setConsistency(?string $consistency): self
    {
        $this->initialized['consistency'] = true;
        $this->consistency = $consistency;

        return $this;
    }

    /**
     * Optional configuration for the `bind` type.
     */
    public function getBindOptions(): ?MountBindOptions
    {
        return $this->bindOptions;
    }

    /**
     * Optional configuration for the `bind` type.
     */
    public function setBindOptions(?MountBindOptions $bindOptions): self
    {
        $this->initialized['bindOptions'] = true;
        $this->bindOptions = $bindOptions;

        return $this;
    }

    /**
     * Optional configuration for the `volume` type.
     */
    public function getVolumeOptions(): ?MountVolumeOptions
    {
        return $this->volumeOptions;
    }

    /**
     * Optional configuration for the `volume` type.
     */
    public function setVolumeOptions(?MountVolumeOptions $volumeOptions): self
    {
        $this->initialized['volumeOptions'] = true;
        $this->volumeOptions = $volumeOptions;

        return $this;
    }

    /**
     * Optional configuration for the `image` type.
     */
    public function getImageOptions(): ?MountImageOptions
    {
        return $this->imageOptions;
    }

    /**
     * Optional configuration for the `image` type.
     */
    public function setImageOptions(?MountImageOptions $imageOptions): self
    {
        $this->initialized['imageOptions'] = true;
        $this->imageOptions = $imageOptions;

        return $this;
    }

    /**
     * Optional configuration for the `tmpfs` type.
     */
    public function getTmpfsOptions(): ?MountTmpfsOptions
    {
        return $this->tmpfsOptions;
    }

    /**
     * Optional configuration for the `tmpfs` type.
     */
    public function setTmpfsOptions(?MountTmpfsOptions $tmpfsOptions): self
    {
        $this->initialized['tmpfsOptions'] = true;
        $this->tmpfsOptions = $tmpfsOptions;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['target' => ['Target', 'getTarget', 'setTarget'], 'source' => ['Source', 'getSource', 'setSource'], 'type' => ['Type', 'getType', 'setType'], 'readOnly' => ['ReadOnly', 'getReadOnly', 'setReadOnly'], 'consistency' => ['Consistency', 'getConsistency', 'setConsistency'], 'bindOptions' => ['BindOptions', 'getBindOptions', 'setBindOptions'], 'volumeOptions' => ['VolumeOptions', 'getVolumeOptions', 'setVolumeOptions'], 'imageOptions' => ['ImageOptions', 'getImageOptions', 'setImageOptions'], 'tmpfsOptions' => ['TmpfsOptions', 'getTmpfsOptions', 'setTmpfsOptions']];
    }
}
