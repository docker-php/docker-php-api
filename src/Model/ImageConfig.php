<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageConfig implements AdditionalPropertiesInterface
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
     * The hostname to use for the container, as a valid RFC 1123 hostname.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     *
     * @var string|null
     */
    protected $hostname;
    /**
     * The domain name to use for the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     *
     * @var string|null
     */
    protected $domainname;
    /**
     * The user that commands are run as inside the container.
     *
     * @var string|null
     */
    protected $user;
    /**
     * Whether to attach to `stdin`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     *
     * @var bool|null
     */
    protected $attachStdin = false;
    /**
     * Whether to attach to `stdout`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     *
     * @var bool|null
     */
    protected $attachStdout = false;
    /**
     * Whether to attach to `stderr`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     *
     * @var bool|null
     */
    protected $attachStderr = false;
    /**
     * An object mapping ports to an empty object in the form:
     *
     * `{"<port>/<tcp|udp|sctp>": {}}`
     *
     * @var array<string, array<string, mixed>>|null
     */
    protected $exposedPorts;
    /**
     * Attach standard streams to a TTY, including `stdin` if it is not closed.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     *
     * @var bool|null
     */
    protected $tty = false;
    /**
     * Open `stdin`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     *
     * @var bool|null
     */
    protected $openStdin = false;
    /**
     * Close `stdin` after one attached client disconnects.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     *
     * @var bool|null
     */
    protected $stdinOnce = false;
    /**
     * A list of environment variables to set inside the container in the
     * form `["VAR=value", ...]`. A variable without `=` is removed from the
     * environment, rather than to have an empty value.
     *
     * @var list<string>|null
     */
    protected $env;
    /**
     * Command to run specified as a string or an array of strings.
     *
     * @var list<string>|null
     */
    protected $cmd;
    /**
     * A test to perform to check that the container is healthy.
     * Healthcheck commands should be side-effect free.
     *
     * @var HealthConfig|null
     */
    protected $healthcheck;
    /**
     * Command is already escaped (Windows only).
     *
     * @var bool|null
     */
    protected $argsEscaped = false;
    /**
     * The name (or reference) of the image to use when creating the container,
     * or which was used when the container was created.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     *
     * @var string|null
     */
    protected $image = '';
    /**
     * An object mapping mount point paths inside the container to empty
     * objects.
     *
     * @var array<string, array<string, mixed>>|null
     */
    protected $volumes;
    /**
     * The working directory for commands to run in.
     *
     * @var string|null
     */
    protected $workingDir;
    /**
     * The entry point for the container as a string or an array of strings.
     *
     * If the array consists of exactly one empty string (`[""]`) then the
     * entry point is reset to system default (i.e., the entry point used by
     * docker when there is no `ENTRYPOINT` instruction in the `Dockerfile`).
     *
     * @var list<string>|null
     */
    protected $entrypoint;
    /**
     * Disable networking for the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     *
     * @var bool|null
     */
    protected $networkDisabled = false;
    /**
     * MAC address of the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     *
     * @var string|null
     */
    protected $macAddress = '';
    /**
     * `ONBUILD` metadata that were defined in the image's `Dockerfile`.
     *
     * @var list<string>|null
     */
    protected $onBuild;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>|null
     */
    protected $labels;
    /**
     * Signal to stop a container as a string or unsigned integer.
     *
     * @var string|null
     */
    protected $stopSignal;
    /**
     * Timeout to stop a container in seconds.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     *
     * @var int|null
     */
    protected $stopTimeout = 10;
    /**
     * Shell for when `RUN`, `CMD`, and `ENTRYPOINT` uses a shell.
     *
     * @var list<string>|null
     */
    protected $shell;

    /**
     * The hostname to use for the container, as a valid RFC 1123 hostname.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     */
    public function getHostname(): ?string
    {
        return $this->hostname;
    }

    /**
     * The hostname to use for the container, as a valid RFC 1123 hostname.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     */
    public function setHostname(?string $hostname): self
    {
        $this->initialized['hostname'] = true;
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * The domain name to use for the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     */
    public function getDomainname(): ?string
    {
        return $this->domainname;
    }

    /**
     * The domain name to use for the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     */
    public function setDomainname(?string $domainname): self
    {
        $this->initialized['domainname'] = true;
        $this->domainname = $domainname;

        return $this;
    }

    /**
     * The user that commands are run as inside the container.
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * The user that commands are run as inside the container.
     */
    public function setUser(?string $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    /**
     * Whether to attach to `stdin`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function getAttachStdin(): ?bool
    {
        return $this->attachStdin;
    }

    /**
     * Whether to attach to `stdin`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function setAttachStdin(?bool $attachStdin): self
    {
        $this->initialized['attachStdin'] = true;
        $this->attachStdin = $attachStdin;

        return $this;
    }

    /**
     * Whether to attach to `stdout`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function getAttachStdout(): ?bool
    {
        return $this->attachStdout;
    }

    /**
     * Whether to attach to `stdout`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function setAttachStdout(?bool $attachStdout): self
    {
        $this->initialized['attachStdout'] = true;
        $this->attachStdout = $attachStdout;

        return $this;
    }

    /**
     * Whether to attach to `stderr`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function getAttachStderr(): ?bool
    {
        return $this->attachStderr;
    }

    /**
     * Whether to attach to `stderr`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function setAttachStderr(?bool $attachStderr): self
    {
        $this->initialized['attachStderr'] = true;
        $this->attachStderr = $attachStderr;

        return $this;
    }

    /**
     * An object mapping ports to an empty object in the form:
     *
     * `{"<port>/<tcp|udp|sctp>": {}}`
     *
     * @return array<string, array<string, mixed>>|null
     */
    public function getExposedPorts(): ?iterable
    {
        return $this->exposedPorts;
    }

    /**
     * An object mapping ports to an empty object in the form:
     *
     * `{"<port>/<tcp|udp|sctp>": {}}`
     *
     * @param array<string, array<string, mixed>>|null $exposedPorts
     */
    public function setExposedPorts(?iterable $exposedPorts): self
    {
        $this->initialized['exposedPorts'] = true;
        $this->exposedPorts = $exposedPorts;

        return $this;
    }

    /**
     * Attach standard streams to a TTY, including `stdin` if it is not closed.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function getTty(): ?bool
    {
        return $this->tty;
    }

    /**
     * Attach standard streams to a TTY, including `stdin` if it is not closed.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function setTty(?bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;

        return $this;
    }

    /**
     * Open `stdin`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function getOpenStdin(): ?bool
    {
        return $this->openStdin;
    }

    /**
     * Open `stdin`.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function setOpenStdin(?bool $openStdin): self
    {
        $this->initialized['openStdin'] = true;
        $this->openStdin = $openStdin;

        return $this;
    }

    /**
     * Close `stdin` after one attached client disconnects.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function getStdinOnce(): ?bool
    {
        return $this->stdinOnce;
    }

    /**
     * Close `stdin` after one attached client disconnects.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always false. It must not be used, and will be removed in API v1.50.
     */
    public function setStdinOnce(?bool $stdinOnce): self
    {
        $this->initialized['stdinOnce'] = true;
        $this->stdinOnce = $stdinOnce;

        return $this;
    }

    /**
     * A list of environment variables to set inside the container in the
     * form `["VAR=value", ...]`. A variable without `=` is removed from the
     * environment, rather than to have an empty value.
     *
     * @return list<string>|null
     */
    public function getEnv(): ?array
    {
        return $this->env;
    }

    /**
     * A list of environment variables to set inside the container in the
     * form `["VAR=value", ...]`. A variable without `=` is removed from the
     * environment, rather than to have an empty value.
     *
     * @param list<string>|null $env
     */
    public function setEnv(?array $env): self
    {
        $this->initialized['env'] = true;
        $this->env = $env;

        return $this;
    }

    /**
     * Command to run specified as a string or an array of strings.
     *
     * @return list<string>|null
     */
    public function getCmd(): ?array
    {
        return $this->cmd;
    }

    /**
     * Command to run specified as a string or an array of strings.
     *
     * @param list<string>|null $cmd
     */
    public function setCmd(?array $cmd): self
    {
        $this->initialized['cmd'] = true;
        $this->cmd = $cmd;

        return $this;
    }

    /**
     * A test to perform to check that the container is healthy.
     * Healthcheck commands should be side-effect free.
     */
    public function getHealthcheck(): ?HealthConfig
    {
        return $this->healthcheck;
    }

    /**
     * A test to perform to check that the container is healthy.
     * Healthcheck commands should be side-effect free.
     */
    public function setHealthcheck(?HealthConfig $healthcheck): self
    {
        $this->initialized['healthcheck'] = true;
        $this->healthcheck = $healthcheck;

        return $this;
    }

    /**
     * Command is already escaped (Windows only).
     */
    public function getArgsEscaped(): ?bool
    {
        return $this->argsEscaped;
    }

    /**
     * Command is already escaped (Windows only).
     */
    public function setArgsEscaped(?bool $argsEscaped): self
    {
        $this->initialized['argsEscaped'] = true;
        $this->argsEscaped = $argsEscaped;

        return $this;
    }

    /**
     * The name (or reference) of the image to use when creating the container,
     * or which was used when the container was created.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * The name (or reference) of the image to use when creating the container,
     * or which was used when the container was created.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always empty. It must not be used, and will be removed in API v1.50.
     */
    public function setImage(?string $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;

        return $this;
    }

    /**
     * An object mapping mount point paths inside the container to empty
     * objects.
     *
     * @return array<string, array<string, mixed>>|null
     */
    public function getVolumes(): ?iterable
    {
        return $this->volumes;
    }

    /**
     * An object mapping mount point paths inside the container to empty
     * objects.
     *
     * @param array<string, array<string, mixed>>|null $volumes
     */
    public function setVolumes(?iterable $volumes): self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;

        return $this;
    }

    /**
     * The working directory for commands to run in.
     */
    public function getWorkingDir(): ?string
    {
        return $this->workingDir;
    }

    /**
     * The working directory for commands to run in.
     */
    public function setWorkingDir(?string $workingDir): self
    {
        $this->initialized['workingDir'] = true;
        $this->workingDir = $workingDir;

        return $this;
    }

    /**
     * The entry point for the container as a string or an array of strings.
     *
     * If the array consists of exactly one empty string (`[""]`) then the
     * entry point is reset to system default (i.e., the entry point used by
     * docker when there is no `ENTRYPOINT` instruction in the `Dockerfile`).
     *
     * @return list<string>|null
     */
    public function getEntrypoint(): ?array
    {
        return $this->entrypoint;
    }

    /**
     * The entry point for the container as a string or an array of strings.
     *
     * If the array consists of exactly one empty string (`[""]`) then the
     * entry point is reset to system default (i.e., the entry point used by
     * docker when there is no `ENTRYPOINT` instruction in the `Dockerfile`).
     *
     * @param list<string>|null $entrypoint
     */
    public function setEntrypoint(?array $entrypoint): self
    {
        $this->initialized['entrypoint'] = true;
        $this->entrypoint = $entrypoint;

        return $this;
    }

    /**
     * Disable networking for the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     */
    public function getNetworkDisabled(): ?bool
    {
        return $this->networkDisabled;
    }

    /**
     * Disable networking for the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     */
    public function setNetworkDisabled(?bool $networkDisabled): self
    {
        $this->initialized['networkDisabled'] = true;
        $this->networkDisabled = $networkDisabled;

        return $this;
    }

    /**
     * MAC address of the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     */
    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    /**
     * MAC address of the container.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     */
    public function setMacAddress(?string $macAddress): self
    {
        $this->initialized['macAddress'] = true;
        $this->macAddress = $macAddress;

        return $this;
    }

    /**
     * `ONBUILD` metadata that were defined in the image's `Dockerfile`.
     *
     * @return list<string>|null
     */
    public function getOnBuild(): ?array
    {
        return $this->onBuild;
    }

    /**
     * `ONBUILD` metadata that were defined in the image's `Dockerfile`.
     *
     * @param list<string>|null $onBuild
     */
    public function setOnBuild(?array $onBuild): self
    {
        $this->initialized['onBuild'] = true;
        $this->onBuild = $onBuild;

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
     * Signal to stop a container as a string or unsigned integer.
     */
    public function getStopSignal(): ?string
    {
        return $this->stopSignal;
    }

    /**
     * Signal to stop a container as a string or unsigned integer.
     */
    public function setStopSignal(?string $stopSignal): self
    {
        $this->initialized['stopSignal'] = true;
        $this->stopSignal = $stopSignal;

        return $this;
    }

    /**
     * Timeout to stop a container in seconds.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     */
    public function getStopTimeout(): ?int
    {
        return $this->stopTimeout;
    }

    /**
     * Timeout to stop a container in seconds.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: this field is not part of the image specification and is
     * > always omitted. It must not be used, and will be removed in API v1.50.
     */
    public function setStopTimeout(?int $stopTimeout): self
    {
        $this->initialized['stopTimeout'] = true;
        $this->stopTimeout = $stopTimeout;

        return $this;
    }

    /**
     * Shell for when `RUN`, `CMD`, and `ENTRYPOINT` uses a shell.
     *
     * @return list<string>|null
     */
    public function getShell(): ?array
    {
        return $this->shell;
    }

    /**
     * Shell for when `RUN`, `CMD`, and `ENTRYPOINT` uses a shell.
     *
     * @param list<string>|null $shell
     */
    public function setShell(?array $shell): self
    {
        $this->initialized['shell'] = true;
        $this->shell = $shell;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['hostname' => ['Hostname', 'getHostname', 'setHostname'], 'domainname' => ['Domainname', 'getDomainname', 'setDomainname'], 'user' => ['User', 'getUser', 'setUser'], 'attachStdin' => ['AttachStdin', 'getAttachStdin', 'setAttachStdin'], 'attachStdout' => ['AttachStdout', 'getAttachStdout', 'setAttachStdout'], 'attachStderr' => ['AttachStderr', 'getAttachStderr', 'setAttachStderr'], 'exposedPorts' => ['ExposedPorts', 'getExposedPorts', 'setExposedPorts'], 'tty' => ['Tty', 'getTty', 'setTty'], 'openStdin' => ['OpenStdin', 'getOpenStdin', 'setOpenStdin'], 'stdinOnce' => ['StdinOnce', 'getStdinOnce', 'setStdinOnce'], 'env' => ['Env', 'getEnv', 'setEnv'], 'cmd' => ['Cmd', 'getCmd', 'setCmd'], 'healthcheck' => ['Healthcheck', 'getHealthcheck', 'setHealthcheck'], 'argsEscaped' => ['ArgsEscaped', 'getArgsEscaped', 'setArgsEscaped'], 'image' => ['Image', 'getImage', 'setImage'], 'volumes' => ['Volumes', 'getVolumes', 'setVolumes'], 'workingDir' => ['WorkingDir', 'getWorkingDir', 'setWorkingDir'], 'entrypoint' => ['Entrypoint', 'getEntrypoint', 'setEntrypoint'], 'networkDisabled' => ['NetworkDisabled', 'getNetworkDisabled', 'setNetworkDisabled'], 'macAddress' => ['MacAddress', 'getMacAddress', 'setMacAddress'], 'onBuild' => ['OnBuild', 'getOnBuild', 'setOnBuild'], 'labels' => ['Labels', 'getLabels', 'setLabels'], 'stopSignal' => ['StopSignal', 'getStopSignal', 'setStopSignal'], 'stopTimeout' => ['StopTimeout', 'getStopTimeout', 'setStopTimeout'], 'shell' => ['Shell', 'getShell', 'setShell']];
    }
}
