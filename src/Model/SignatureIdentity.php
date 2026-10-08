<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class SignatureIdentity implements AdditionalPropertiesInterface
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
     * Name is a textual description summarizing the type of signature.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Timestamps contains a list of verified signed timestamps for the signature.
     *
     * @var list<SignatureTimestamp>|null
     */
    protected $timestamps;
    /**
     * KnownSignerIdentity is an identifier for a special signer identity that is known to the implementation.
     *
     * @var string|null
     */
    protected $knownSigner;
    /**
     * DockerReference is the Docker image reference associated with the signature.
     * This is an optional field only present in older hashedrecord signatures.
     *
     * @var string|null
     */
    protected $dockerReference;
    /**
     * SignerIdentity contains information about the signer certificate used to sign the image.
     *
     * @var SignerIdentity|null
     */
    protected $signer;
    /**
     * SignatureType is the type of signature format.
     *
     * @var string|null
     */
    protected $signatureType;
    /**
     * Error contains error information if signature verification failed.
     * Other fields will be empty in this case.
     *
     * @var string|null
     */
    protected $error;
    /**
     * Warnings contains any warnings that occurred during signature verification.
     * For example, if there was no internet connectivity and cached trust roots were used.
     * Warning does not indicate a failed verification but may point to configuration issues.
     *
     * @var list<string>|null
     */
    protected $warnings;

    /**
     * Name is a textual description summarizing the type of signature.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name is a textual description summarizing the type of signature.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Timestamps contains a list of verified signed timestamps for the signature.
     *
     * @return list<SignatureTimestamp>|null
     */
    public function getTimestamps(): ?array
    {
        return $this->timestamps;
    }

    /**
     * Timestamps contains a list of verified signed timestamps for the signature.
     *
     * @param list<SignatureTimestamp>|null $timestamps
     */
    public function setTimestamps(?array $timestamps): self
    {
        $this->initialized['timestamps'] = true;
        $this->timestamps = $timestamps;

        return $this;
    }

    /**
     * KnownSignerIdentity is an identifier for a special signer identity that is known to the implementation.
     */
    public function getKnownSigner(): ?string
    {
        return $this->knownSigner;
    }

    /**
     * KnownSignerIdentity is an identifier for a special signer identity that is known to the implementation.
     */
    public function setKnownSigner(?string $knownSigner): self
    {
        $this->initialized['knownSigner'] = true;
        $this->knownSigner = $knownSigner;

        return $this;
    }

    /**
     * DockerReference is the Docker image reference associated with the signature.
     * This is an optional field only present in older hashedrecord signatures.
     */
    public function getDockerReference(): ?string
    {
        return $this->dockerReference;
    }

    /**
     * DockerReference is the Docker image reference associated with the signature.
     * This is an optional field only present in older hashedrecord signatures.
     */
    public function setDockerReference(?string $dockerReference): self
    {
        $this->initialized['dockerReference'] = true;
        $this->dockerReference = $dockerReference;

        return $this;
    }

    /**
     * SignerIdentity contains information about the signer certificate used to sign the image.
     */
    public function getSigner(): ?SignerIdentity
    {
        return $this->signer;
    }

    /**
     * SignerIdentity contains information about the signer certificate used to sign the image.
     */
    public function setSigner(?SignerIdentity $signer): self
    {
        $this->initialized['signer'] = true;
        $this->signer = $signer;

        return $this;
    }

    /**
     * SignatureType is the type of signature format.
     */
    public function getSignatureType(): ?string
    {
        return $this->signatureType;
    }

    /**
     * SignatureType is the type of signature format.
     */
    public function setSignatureType(?string $signatureType): self
    {
        $this->initialized['signatureType'] = true;
        $this->signatureType = $signatureType;

        return $this;
    }

    /**
     * Error contains error information if signature verification failed.
     * Other fields will be empty in this case.
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * Error contains error information if signature verification failed.
     * Other fields will be empty in this case.
     */
    public function setError(?string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;

        return $this;
    }

    /**
     * Warnings contains any warnings that occurred during signature verification.
     * For example, if there was no internet connectivity and cached trust roots were used.
     * Warning does not indicate a failed verification but may point to configuration issues.
     *
     * @return list<string>|null
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * Warnings contains any warnings that occurred during signature verification.
     * For example, if there was no internet connectivity and cached trust roots were used.
     * Warning does not indicate a failed verification but may point to configuration issues.
     *
     * @param list<string>|null $warnings
     */
    public function setWarnings(?array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['Name', 'getName', 'setName'], 'timestamps' => ['Timestamps', 'getTimestamps', 'setTimestamps'], 'knownSigner' => ['KnownSigner', 'getKnownSigner', 'setKnownSigner'], 'dockerReference' => ['DockerReference', 'getDockerReference', 'setDockerReference'], 'signer' => ['Signer', 'getSigner', 'setSigner'], 'signatureType' => ['SignatureType', 'getSignatureType', 'setSignatureType'], 'error' => ['Error', 'getError', 'setError'], 'warnings' => ['Warnings', 'getWarnings', 'setWarnings']];
    }
}
