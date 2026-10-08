<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class AuthConfig implements AdditionalPropertiesInterface
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
    protected $username;
    /**
     * @var string|null
     */
    protected $password;
    /**
     * @var string|null
     */
    protected $serveraddress;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;

        return $this;
    }

    public function getServeraddress(): ?string
    {
        return $this->serveraddress;
    }

    public function setServeraddress(?string $serveraddress): self
    {
        $this->initialized['serveraddress'] = true;
        $this->serveraddress = $serveraddress;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['username' => ['username', 'getUsername', 'setUsername'], 'password' => ['password', 'getPassword', 'setPassword'], 'serveraddress' => ['serveraddress', 'getServeraddress', 'setServeraddress']];
    }
}
