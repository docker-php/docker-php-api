<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ServiceInfo implements AdditionalPropertiesInterface
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
    protected $vIP;
    /**
     * @var list<string>|null
     */
    protected $ports;
    /**
     * @var int|null
     */
    protected $localLBIndex;
    /**
     * @var list<NetworkTaskInfo>|null
     */
    protected $tasks;

    public function getVIP(): ?string
    {
        return $this->vIP;
    }

    public function setVIP(?string $vIP): self
    {
        $this->initialized['vIP'] = true;
        $this->vIP = $vIP;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getPorts(): ?array
    {
        return $this->ports;
    }

    /**
     * @param list<string>|null $ports
     */
    public function setPorts(?array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }

    public function getLocalLBIndex(): ?int
    {
        return $this->localLBIndex;
    }

    public function setLocalLBIndex(?int $localLBIndex): self
    {
        $this->initialized['localLBIndex'] = true;
        $this->localLBIndex = $localLBIndex;

        return $this;
    }

    /**
     * @return list<NetworkTaskInfo>|null
     */
    public function getTasks(): ?array
    {
        return $this->tasks;
    }

    /**
     * @param list<NetworkTaskInfo>|null $tasks
     */
    public function setTasks(?array $tasks): self
    {
        $this->initialized['tasks'] = true;
        $this->tasks = $tasks;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['vIP' => ['VIP', 'getVIP', 'setVIP'], 'ports' => ['Ports', 'getPorts', 'setPorts'], 'localLBIndex' => ['LocalLBIndex', 'getLocalLBIndex', 'setLocalLBIndex'], 'tasks' => ['Tasks', 'getTasks', 'setTasks']];
    }
}
