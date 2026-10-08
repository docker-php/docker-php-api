<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class AuthResponse implements AdditionalPropertiesInterface
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
     * The status of the authentication.
     *
     * @var string|null
     */
    protected $status;
    /**
     * An opaque token used to authenticate a user after a successful login.
     *
     * @var string|null
     */
    protected $identityToken;

    /**
     * The status of the authentication.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * The status of the authentication.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * An opaque token used to authenticate a user after a successful login.
     */
    public function getIdentityToken(): ?string
    {
        return $this->identityToken;
    }

    /**
     * An opaque token used to authenticate a user after a successful login.
     */
    public function setIdentityToken(?string $identityToken): self
    {
        $this->initialized['identityToken'] = true;
        $this->identityToken = $identityToken;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['status' => ['Status', 'getStatus', 'setStatus'], 'identityToken' => ['IdentityToken', 'getIdentityToken', 'setIdentityToken']];
    }
}
