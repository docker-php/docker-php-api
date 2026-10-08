<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class Plugin implements AdditionalPropertiesInterface
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
    protected $id;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     *
     * @var bool|null
     */
    protected $enabled;
    /**
     * user-configurable settings for the plugin.
     *
     * @var PluginSettings|null
     */
    protected $settings;
    /**
     * plugin remote reference used to push/pull the plugin.
     *
     * @var string|null
     */
    protected $pluginReference;
    /**
     * The config of a plugin.
     *
     * @var PluginConfig|null
     */
    protected $config;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     */
    public function setEnabled(?bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * user-configurable settings for the plugin.
     */
    public function getSettings(): ?PluginSettings
    {
        return $this->settings;
    }

    /**
     * user-configurable settings for the plugin.
     */
    public function setSettings(?PluginSettings $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;

        return $this;
    }

    /**
     * plugin remote reference used to push/pull the plugin.
     */
    public function getPluginReference(): ?string
    {
        return $this->pluginReference;
    }

    /**
     * plugin remote reference used to push/pull the plugin.
     */
    public function setPluginReference(?string $pluginReference): self
    {
        $this->initialized['pluginReference'] = true;
        $this->pluginReference = $pluginReference;

        return $this;
    }

    /**
     * The config of a plugin.
     */
    public function getConfig(): ?PluginConfig
    {
        return $this->config;
    }

    /**
     * The config of a plugin.
     */
    public function setConfig(?PluginConfig $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['Id', 'getId', 'setId'], 'name' => ['Name', 'getName', 'setName'], 'enabled' => ['Enabled', 'getEnabled', 'setEnabled'], 'settings' => ['Settings', 'getSettings', 'setSettings'], 'pluginReference' => ['PluginReference', 'getPluginReference', 'setPluginReference'], 'config' => ['Config', 'getConfig', 'setConfig']];
    }
}
