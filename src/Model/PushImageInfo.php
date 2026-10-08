<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class PushImageInfo implements AdditionalPropertiesInterface
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
     * @var ErrorDetail|null
     */
    protected $errorDetail;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var ProgressDetail|null
     */
    protected $progressDetail;

    public function getErrorDetail(): ?ErrorDetail
    {
        return $this->errorDetail;
    }

    public function setErrorDetail(?ErrorDetail $errorDetail): self
    {
        $this->initialized['errorDetail'] = true;
        $this->errorDetail = $errorDetail;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    public function getProgressDetail(): ?ProgressDetail
    {
        return $this->progressDetail;
    }

    public function setProgressDetail(?ProgressDetail $progressDetail): self
    {
        $this->initialized['progressDetail'] = true;
        $this->progressDetail = $progressDetail;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['errorDetail' => ['errorDetail', 'getErrorDetail', 'setErrorDetail'], 'status' => ['status', 'getStatus', 'setStatus'], 'progressDetail' => ['progressDetail', 'getProgressDetail', 'setProgressDetail']];
    }
}
