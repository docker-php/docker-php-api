<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainerSummaryHostConfig implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $networkMode;
    /**
     * Arbitrary key-value metadata attached to container.
     *
     * @var array<string, string>|null
     */
    protected $annotations;

    public function getNetworkMode(): ?string
    {
        return $this->networkMode;
    }

    public function setNetworkMode(?string $networkMode): self
    {
        $this->initialized['networkMode'] = true;
        $this->networkMode = $networkMode;

        return $this;
    }

    /**
     * Arbitrary key-value metadata attached to container.
     *
     * @return array<string, string>|null
     */
    public function getAnnotations(): ?iterable
    {
        return $this->annotations;
    }

    /**
     * Arbitrary key-value metadata attached to container.
     *
     * @param array<string, string>|null $annotations
     */
    public function setAnnotations(?iterable $annotations): self
    {
        $this->initialized['annotations'] = true;
        $this->annotations = $annotations;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['networkMode' => ['NetworkMode', 'getNetworkMode', 'setNetworkMode'], 'annotations' => ['Annotations', 'getAnnotations', 'setAnnotations']];
    }
}
