<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class RegistryServiceConfig implements AdditionalPropertiesInterface
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
     * List of IP ranges to which nondistributable artifacts can be pushed,
     * using the CIDR syntax [RFC 4632](https://tools.ietf.org/html/4632).
     *
     * <p><br /></p>
     *
     * > **Deprecated**: Pushing nondistributable artifacts is now always enabled
     * > and this field is always `null`. This field will be removed in a API v1.49.
     *
     * @var list<string>|null
     */
    protected $allowNondistributableArtifactsCIDRs;
    /**
     * List of registry hostnames to which nondistributable artifacts can be
     * pushed, using the format `<hostname>[:<port>]` or `<IP address>[:<port>]`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: Pushing nondistributable artifacts is now always enabled
     * > and this field is always `null`. This field will be removed in a API v1.49.
     *
     * @var list<string>|null
     */
    protected $allowNondistributableArtifactsHostnames;
    /**
     * List of IP ranges of insecure registries, using the CIDR syntax
     * ([RFC 4632](https://tools.ietf.org/html/4632)). Insecure registries
     * accept un-encrypted (HTTP) and/or untrusted (HTTPS with certificates
     * from unknown CAs) communication.
     *
     * By default, local registries (`::1/128` and `127.0.0.0/8`) are configured as
     * insecure. All other registries are secure. Communicating with an
     * insecure registry is not possible if the daemon assumes that registry
     * is secure.
     *
     * This configuration override this behavior, insecure communication with
     * registries whose resolved IP address is within the subnet described by
     * the CIDR syntax.
     *
     * Registries can also be marked insecure by hostname. Those registries
     * are listed under `IndexConfigs` and have their `Secure` field set to
     * `false`.
     *
     * > **Warning**: Using this option can be useful when running a local
     * > registry, but introduces security vulnerabilities. This option
     * > should therefore ONLY be used for testing purposes. For increased
     * > security, users should add their CA to their system's list of trusted
     * > CAs instead of enabling this option.
     *
     * @var list<string>|null
     */
    protected $insecureRegistryCIDRs;
    /**
     * @var array<string, IndexInfo>|null
     */
    protected $indexConfigs;
    /**
     * List of registry URLs that act as a mirror for the official
     * (`docker.io`) registry.
     *
     * @var list<string>|null
     */
    protected $mirrors;

    /**
     * List of IP ranges to which nondistributable artifacts can be pushed,
     * using the CIDR syntax [RFC 4632](https://tools.ietf.org/html/4632).
     *
     * <p><br /></p>
     *
     * > **Deprecated**: Pushing nondistributable artifacts is now always enabled
     * > and this field is always `null`. This field will be removed in a API v1.49.
     *
     * @return list<string>|null
     */
    public function getAllowNondistributableArtifactsCIDRs(): ?array
    {
        return $this->allowNondistributableArtifactsCIDRs;
    }

    /**
     * List of IP ranges to which nondistributable artifacts can be pushed,
     * using the CIDR syntax [RFC 4632](https://tools.ietf.org/html/4632).
     *
     * <p><br /></p>
     *
     * > **Deprecated**: Pushing nondistributable artifacts is now always enabled
     * > and this field is always `null`. This field will be removed in a API v1.49.
     *
     * @param list<string>|null $allowNondistributableArtifactsCIDRs
     */
    public function setAllowNondistributableArtifactsCIDRs(?array $allowNondistributableArtifactsCIDRs): self
    {
        $this->initialized['allowNondistributableArtifactsCIDRs'] = true;
        $this->allowNondistributableArtifactsCIDRs = $allowNondistributableArtifactsCIDRs;

        return $this;
    }

    /**
     * List of registry hostnames to which nondistributable artifacts can be
     * pushed, using the format `<hostname>[:<port>]` or `<IP address>[:<port>]`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: Pushing nondistributable artifacts is now always enabled
     * > and this field is always `null`. This field will be removed in a API v1.49.
     *
     * @return list<string>|null
     */
    public function getAllowNondistributableArtifactsHostnames(): ?array
    {
        return $this->allowNondistributableArtifactsHostnames;
    }

    /**
     * List of registry hostnames to which nondistributable artifacts can be
     * pushed, using the format `<hostname>[:<port>]` or `<IP address>[:<port>]`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: Pushing nondistributable artifacts is now always enabled
     * > and this field is always `null`. This field will be removed in a API v1.49.
     *
     * @param list<string>|null $allowNondistributableArtifactsHostnames
     */
    public function setAllowNondistributableArtifactsHostnames(?array $allowNondistributableArtifactsHostnames): self
    {
        $this->initialized['allowNondistributableArtifactsHostnames'] = true;
        $this->allowNondistributableArtifactsHostnames = $allowNondistributableArtifactsHostnames;

        return $this;
    }

    /**
     * List of IP ranges of insecure registries, using the CIDR syntax
     * ([RFC 4632](https://tools.ietf.org/html/4632)). Insecure registries
     * accept un-encrypted (HTTP) and/or untrusted (HTTPS with certificates
     * from unknown CAs) communication.
     *
     * By default, local registries (`::1/128` and `127.0.0.0/8`) are configured as
     * insecure. All other registries are secure. Communicating with an
     * insecure registry is not possible if the daemon assumes that registry
     * is secure.
     *
     * This configuration override this behavior, insecure communication with
     * registries whose resolved IP address is within the subnet described by
     * the CIDR syntax.
     *
     * Registries can also be marked insecure by hostname. Those registries
     * are listed under `IndexConfigs` and have their `Secure` field set to
     * `false`.
     *
     * > **Warning**: Using this option can be useful when running a local
     * > registry, but introduces security vulnerabilities. This option
     * > should therefore ONLY be used for testing purposes. For increased
     * > security, users should add their CA to their system's list of trusted
     * > CAs instead of enabling this option.
     *
     * @return list<string>|null
     */
    public function getInsecureRegistryCIDRs(): ?array
    {
        return $this->insecureRegistryCIDRs;
    }

    /**
     * List of IP ranges of insecure registries, using the CIDR syntax
     * ([RFC 4632](https://tools.ietf.org/html/4632)). Insecure registries
     * accept un-encrypted (HTTP) and/or untrusted (HTTPS with certificates
     * from unknown CAs) communication.
     *
     * By default, local registries (`::1/128` and `127.0.0.0/8`) are configured as
     * insecure. All other registries are secure. Communicating with an
     * insecure registry is not possible if the daemon assumes that registry
     * is secure.
     *
     * This configuration override this behavior, insecure communication with
     * registries whose resolved IP address is within the subnet described by
     * the CIDR syntax.
     *
     * Registries can also be marked insecure by hostname. Those registries
     * are listed under `IndexConfigs` and have their `Secure` field set to
     * `false`.
     *
     * > **Warning**: Using this option can be useful when running a local
     * > registry, but introduces security vulnerabilities. This option
     * > should therefore ONLY be used for testing purposes. For increased
     * > security, users should add their CA to their system's list of trusted
     * > CAs instead of enabling this option.
     *
     * @param list<string>|null $insecureRegistryCIDRs
     */
    public function setInsecureRegistryCIDRs(?array $insecureRegistryCIDRs): self
    {
        $this->initialized['insecureRegistryCIDRs'] = true;
        $this->insecureRegistryCIDRs = $insecureRegistryCIDRs;

        return $this;
    }

    /**
     * @return array<string, IndexInfo>|null
     */
    public function getIndexConfigs(): ?iterable
    {
        return $this->indexConfigs;
    }

    /**
     * @param array<string, IndexInfo>|null $indexConfigs
     */
    public function setIndexConfigs(?iterable $indexConfigs): self
    {
        $this->initialized['indexConfigs'] = true;
        $this->indexConfigs = $indexConfigs;

        return $this;
    }

    /**
     * List of registry URLs that act as a mirror for the official
     * (`docker.io`) registry.
     *
     * @return list<string>|null
     */
    public function getMirrors(): ?array
    {
        return $this->mirrors;
    }

    /**
     * List of registry URLs that act as a mirror for the official
     * (`docker.io`) registry.
     *
     * @param list<string>|null $mirrors
     */
    public function setMirrors(?array $mirrors): self
    {
        $this->initialized['mirrors'] = true;
        $this->mirrors = $mirrors;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['allowNondistributableArtifactsCIDRs' => ['AllowNondistributableArtifactsCIDRs', 'getAllowNondistributableArtifactsCIDRs', 'setAllowNondistributableArtifactsCIDRs'], 'allowNondistributableArtifactsHostnames' => ['AllowNondistributableArtifactsHostnames', 'getAllowNondistributableArtifactsHostnames', 'setAllowNondistributableArtifactsHostnames'], 'insecureRegistryCIDRs' => ['InsecureRegistryCIDRs', 'getInsecureRegistryCIDRs', 'setInsecureRegistryCIDRs'], 'indexConfigs' => ['IndexConfigs', 'getIndexConfigs', 'setIndexConfigs'], 'mirrors' => ['Mirrors', 'getMirrors', 'setMirrors']];
    }
}
