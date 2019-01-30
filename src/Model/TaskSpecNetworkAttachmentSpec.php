<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Model;

class TaskSpecNetworkAttachmentSpec
{
    /**
     * ID of the container represented by this task.
     *
     * @var string
     */
    protected $containerID;

    /**
     * ID of the container represented by this task.
     *
     * @return string
     */
    public function getContainerID(): ?string
    {
        return $this->containerID;
    }

    /**
     * ID of the container represented by this task.
     *
     * @param string $containerID
     *
     * @return self
     */
    public function setContainerID(?string $containerID): self
    {
        $this->containerID = $containerID;

        return $this;
    }
}
