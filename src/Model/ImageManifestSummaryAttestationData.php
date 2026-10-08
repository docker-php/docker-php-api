<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageManifestSummaryAttestationData implements AdditionalPropertiesInterface
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
     * The digest of the image manifest that this attestation is for.
     *
     * @var string|null
     */
    protected $for;

    /**
     * The digest of the image manifest that this attestation is for.
     */
    public function getFor(): ?string
    {
        return $this->for;
    }

    /**
     * The digest of the image manifest that this attestation is for.
     */
    public function setFor(?string $for): self
    {
        $this->initialized['for'] = true;
        $this->for = $for;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['for' => ['For', 'getFor', 'setFor']];
    }
}
