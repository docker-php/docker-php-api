<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TaskSpecContainerSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecContainerSpec::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecContainerSpec::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\TaskSpecContainerSpec();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('TTY', $data) && \is_int($data['TTY'])) {
            $data['TTY'] = (bool) $data['TTY'];
        }
        if (\array_key_exists('OpenStdin', $data) && \is_int($data['OpenStdin'])) {
            $data['OpenStdin'] = (bool) $data['OpenStdin'];
        }
        if (\array_key_exists('ReadOnly', $data) && \is_int($data['ReadOnly'])) {
            $data['ReadOnly'] = (bool) $data['ReadOnly'];
        }
        if (\array_key_exists('Init', $data) && \is_int($data['Init'])) {
            $data['Init'] = (bool) $data['Init'];
        }
        if (\array_key_exists('Image', $data) && null !== $data['Image']) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        } elseif (\array_key_exists('Image', $data) && null === $data['Image']) {
            $object->setImage(null);
            unset($data['Image']);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
            unset($data['Labels']);
        }
        if (\array_key_exists('Command', $data) && null !== $data['Command']) {
            $values_1 = [];
            foreach ($data['Command'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCommand($values_1);
            unset($data['Command']);
        } elseif (\array_key_exists('Command', $data) && null === $data['Command']) {
            $object->setCommand(null);
            unset($data['Command']);
        }
        if (\array_key_exists('Args', $data) && null !== $data['Args']) {
            $values_2 = [];
            foreach ($data['Args'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setArgs($values_2);
            unset($data['Args']);
        } elseif (\array_key_exists('Args', $data) && null === $data['Args']) {
            $object->setArgs(null);
            unset($data['Args']);
        }
        if (\array_key_exists('Hostname', $data) && null !== $data['Hostname']) {
            $object->setHostname($data['Hostname']);
            unset($data['Hostname']);
        } elseif (\array_key_exists('Hostname', $data) && null === $data['Hostname']) {
            $object->setHostname(null);
            unset($data['Hostname']);
        }
        if (\array_key_exists('Env', $data) && null !== $data['Env']) {
            $values_3 = [];
            foreach ($data['Env'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setEnv($values_3);
            unset($data['Env']);
        } elseif (\array_key_exists('Env', $data) && null === $data['Env']) {
            $object->setEnv(null);
            unset($data['Env']);
        }
        if (\array_key_exists('Dir', $data) && null !== $data['Dir']) {
            $object->setDir($data['Dir']);
            unset($data['Dir']);
        } elseif (\array_key_exists('Dir', $data) && null === $data['Dir']) {
            $object->setDir(null);
            unset($data['Dir']);
        }
        if (\array_key_exists('User', $data) && null !== $data['User']) {
            $object->setUser($data['User']);
            unset($data['User']);
        } elseif (\array_key_exists('User', $data) && null === $data['User']) {
            $object->setUser(null);
            unset($data['User']);
        }
        if (\array_key_exists('Groups', $data) && null !== $data['Groups']) {
            $values_4 = [];
            foreach ($data['Groups'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setGroups($values_4);
            unset($data['Groups']);
        } elseif (\array_key_exists('Groups', $data) && null === $data['Groups']) {
            $object->setGroups(null);
            unset($data['Groups']);
        }
        if (\array_key_exists('Privileges', $data) && null !== $data['Privileges']) {
            $object->setPrivileges($this->denormalizer->denormalize($data['Privileges'], \Docker\API\Model\TaskSpecContainerSpecPrivileges::class, 'json', $context));
            unset($data['Privileges']);
        } elseif (\array_key_exists('Privileges', $data) && null === $data['Privileges']) {
            $object->setPrivileges(null);
            unset($data['Privileges']);
        }
        if (\array_key_exists('TTY', $data) && null !== $data['TTY']) {
            $object->setTTY($data['TTY']);
            unset($data['TTY']);
        } elseif (\array_key_exists('TTY', $data) && null === $data['TTY']) {
            $object->setTTY(null);
            unset($data['TTY']);
        }
        if (\array_key_exists('OpenStdin', $data) && null !== $data['OpenStdin']) {
            $object->setOpenStdin($data['OpenStdin']);
            unset($data['OpenStdin']);
        } elseif (\array_key_exists('OpenStdin', $data) && null === $data['OpenStdin']) {
            $object->setOpenStdin(null);
            unset($data['OpenStdin']);
        }
        if (\array_key_exists('ReadOnly', $data) && null !== $data['ReadOnly']) {
            $object->setReadOnly($data['ReadOnly']);
            unset($data['ReadOnly']);
        } elseif (\array_key_exists('ReadOnly', $data) && null === $data['ReadOnly']) {
            $object->setReadOnly(null);
            unset($data['ReadOnly']);
        }
        if (\array_key_exists('Mounts', $data) && null !== $data['Mounts']) {
            $values_5 = [];
            foreach ($data['Mounts'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, \Docker\API\Model\Mount::class, 'json', $context);
            }
            $object->setMounts($values_5);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && null === $data['Mounts']) {
            $object->setMounts(null);
            unset($data['Mounts']);
        }
        if (\array_key_exists('StopSignal', $data) && null !== $data['StopSignal']) {
            $object->setStopSignal($data['StopSignal']);
            unset($data['StopSignal']);
        } elseif (\array_key_exists('StopSignal', $data) && null === $data['StopSignal']) {
            $object->setStopSignal(null);
            unset($data['StopSignal']);
        }
        if (\array_key_exists('StopGracePeriod', $data) && null !== $data['StopGracePeriod']) {
            $object->setStopGracePeriod($data['StopGracePeriod']);
            unset($data['StopGracePeriod']);
        } elseif (\array_key_exists('StopGracePeriod', $data) && null === $data['StopGracePeriod']) {
            $object->setStopGracePeriod(null);
            unset($data['StopGracePeriod']);
        }
        if (\array_key_exists('Healthcheck', $data) && null !== $data['Healthcheck']) {
            $object->setHealthcheck($this->denormalizer->denormalize($data['Healthcheck'], \Docker\API\Model\HealthConfig::class, 'json', $context));
            unset($data['Healthcheck']);
        } elseif (\array_key_exists('Healthcheck', $data) && null === $data['Healthcheck']) {
            $object->setHealthcheck(null);
            unset($data['Healthcheck']);
        }
        if (\array_key_exists('Hosts', $data) && null !== $data['Hosts']) {
            $values_6 = [];
            foreach ($data['Hosts'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setHosts($values_6);
            unset($data['Hosts']);
        } elseif (\array_key_exists('Hosts', $data) && null === $data['Hosts']) {
            $object->setHosts(null);
            unset($data['Hosts']);
        }
        if (\array_key_exists('DNSConfig', $data) && null !== $data['DNSConfig']) {
            $object->setDNSConfig($this->denormalizer->denormalize($data['DNSConfig'], \Docker\API\Model\TaskSpecContainerSpecDNSConfig::class, 'json', $context));
            unset($data['DNSConfig']);
        } elseif (\array_key_exists('DNSConfig', $data) && null === $data['DNSConfig']) {
            $object->setDNSConfig(null);
            unset($data['DNSConfig']);
        }
        if (\array_key_exists('Secrets', $data) && null !== $data['Secrets']) {
            $values_7 = [];
            foreach ($data['Secrets'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, \Docker\API\Model\TaskSpecContainerSpecSecretsItem::class, 'json', $context);
            }
            $object->setSecrets($values_7);
            unset($data['Secrets']);
        } elseif (\array_key_exists('Secrets', $data) && null === $data['Secrets']) {
            $object->setSecrets(null);
            unset($data['Secrets']);
        }
        if (\array_key_exists('OomScoreAdj', $data) && null !== $data['OomScoreAdj']) {
            $object->setOomScoreAdj($data['OomScoreAdj']);
            unset($data['OomScoreAdj']);
        } elseif (\array_key_exists('OomScoreAdj', $data) && null === $data['OomScoreAdj']) {
            $object->setOomScoreAdj(null);
            unset($data['OomScoreAdj']);
        }
        if (\array_key_exists('Configs', $data) && null !== $data['Configs']) {
            $values_8 = [];
            foreach ($data['Configs'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, \Docker\API\Model\TaskSpecContainerSpecConfigsItem::class, 'json', $context);
            }
            $object->setConfigs($values_8);
            unset($data['Configs']);
        } elseif (\array_key_exists('Configs', $data) && null === $data['Configs']) {
            $object->setConfigs(null);
            unset($data['Configs']);
        }
        if (\array_key_exists('Isolation', $data) && null !== $data['Isolation']) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        } elseif (\array_key_exists('Isolation', $data) && null === $data['Isolation']) {
            $object->setIsolation(null);
            unset($data['Isolation']);
        }
        if (\array_key_exists('Init', $data) && null !== $data['Init']) {
            $object->setInit($data['Init']);
            unset($data['Init']);
        } elseif (\array_key_exists('Init', $data) && null === $data['Init']) {
            $object->setInit(null);
            unset($data['Init']);
        }
        if (\array_key_exists('Sysctls', $data) && null !== $data['Sysctls']) {
            $values_9 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Sysctls'] as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $object->setSysctls($values_9);
            unset($data['Sysctls']);
        } elseif (\array_key_exists('Sysctls', $data) && null === $data['Sysctls']) {
            $object->setSysctls(null);
            unset($data['Sysctls']);
        }
        if (\array_key_exists('CapabilityAdd', $data) && null !== $data['CapabilityAdd']) {
            $values_10 = [];
            foreach ($data['CapabilityAdd'] as $value_10) {
                $values_10[] = $value_10;
            }
            $object->setCapabilityAdd($values_10);
            unset($data['CapabilityAdd']);
        } elseif (\array_key_exists('CapabilityAdd', $data) && null === $data['CapabilityAdd']) {
            $object->setCapabilityAdd(null);
            unset($data['CapabilityAdd']);
        }
        if (\array_key_exists('CapabilityDrop', $data) && null !== $data['CapabilityDrop']) {
            $values_11 = [];
            foreach ($data['CapabilityDrop'] as $value_11) {
                $values_11[] = $value_11;
            }
            $object->setCapabilityDrop($values_11);
            unset($data['CapabilityDrop']);
        } elseif (\array_key_exists('CapabilityDrop', $data) && null === $data['CapabilityDrop']) {
            $object->setCapabilityDrop(null);
            unset($data['CapabilityDrop']);
        }
        if (\array_key_exists('Ulimits', $data) && null !== $data['Ulimits']) {
            $values_12 = [];
            foreach ($data['Ulimits'] as $value_12) {
                $values_12[] = $this->denormalizer->denormalize($value_12, \Docker\API\Model\TaskSpecContainerSpecUlimitsItem::class, 'json', $context);
            }
            $object->setUlimits($values_12);
            unset($data['Ulimits']);
        } elseif (\array_key_exists('Ulimits', $data) && null === $data['Ulimits']) {
            $object->setUlimits(null);
            unset($data['Ulimits']);
        }
        foreach ($data as $key_2 => $value_13) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_13;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('image') && null !== $data->getImage()) {
            $dataArray['Image'] = $data->getImage();
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['Labels'] = $values;
        }
        if ($data->isInitialized('command') && null !== $data->getCommand()) {
            $values_1 = [];
            foreach ($data->getCommand() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['Command'] = $values_1;
        }
        if ($data->isInitialized('args') && null !== $data->getArgs()) {
            $values_2 = [];
            foreach ($data->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['Args'] = $values_2;
        }
        if ($data->isInitialized('hostname') && null !== $data->getHostname()) {
            $dataArray['Hostname'] = $data->getHostname();
        }
        if ($data->isInitialized('env') && null !== $data->getEnv()) {
            $values_3 = [];
            foreach ($data->getEnv() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['Env'] = $values_3;
        }
        if ($data->isInitialized('dir') && null !== $data->getDir()) {
            $dataArray['Dir'] = $data->getDir();
        }
        if ($data->isInitialized('user') && null !== $data->getUser()) {
            $dataArray['User'] = $data->getUser();
        }
        if ($data->isInitialized('groups') && null !== $data->getGroups()) {
            $values_4 = [];
            foreach ($data->getGroups() as $value_4) {
                $values_4[] = $value_4;
            }
            $dataArray['Groups'] = $values_4;
        }
        if ($data->isInitialized('privileges') && null !== $data->getPrivileges()) {
            $dataArray['Privileges'] = null === $data->getPrivileges() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getPrivileges(), 'json', $context));
        }
        if ($data->isInitialized('tTY') && null !== $data->getTTY()) {
            $dataArray['TTY'] = $data->getTTY();
        }
        if ($data->isInitialized('openStdin') && null !== $data->getOpenStdin()) {
            $dataArray['OpenStdin'] = $data->getOpenStdin();
        }
        if ($data->isInitialized('readOnly') && null !== $data->getReadOnly()) {
            $dataArray['ReadOnly'] = $data->getReadOnly();
        }
        if ($data->isInitialized('mounts') && null !== $data->getMounts()) {
            $values_5 = [];
            foreach ($data->getMounts() as $value_5) {
                $values_5[] = null === $value_5 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_5, 'json', $context));
            }
            $dataArray['Mounts'] = $values_5;
        }
        if ($data->isInitialized('stopSignal') && null !== $data->getStopSignal()) {
            $dataArray['StopSignal'] = $data->getStopSignal();
        }
        if ($data->isInitialized('stopGracePeriod') && null !== $data->getStopGracePeriod()) {
            $dataArray['StopGracePeriod'] = $data->getStopGracePeriod();
        }
        if ($data->isInitialized('healthcheck') && null !== $data->getHealthcheck()) {
            $dataArray['Healthcheck'] = null === $data->getHealthcheck() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getHealthcheck(), 'json', $context));
        }
        if ($data->isInitialized('hosts') && null !== $data->getHosts()) {
            $values_6 = [];
            foreach ($data->getHosts() as $value_6) {
                $values_6[] = $value_6;
            }
            $dataArray['Hosts'] = $values_6;
        }
        if ($data->isInitialized('dNSConfig') && null !== $data->getDNSConfig()) {
            $dataArray['DNSConfig'] = null === $data->getDNSConfig() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getDNSConfig(), 'json', $context));
        }
        if ($data->isInitialized('secrets') && null !== $data->getSecrets()) {
            $values_7 = [];
            foreach ($data->getSecrets() as $value_7) {
                $values_7[] = null === $value_7 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_7, 'json', $context));
            }
            $dataArray['Secrets'] = $values_7;
        }
        if ($data->isInitialized('oomScoreAdj') && null !== $data->getOomScoreAdj()) {
            $dataArray['OomScoreAdj'] = $data->getOomScoreAdj();
        }
        if ($data->isInitialized('configs') && null !== $data->getConfigs()) {
            $values_8 = [];
            foreach ($data->getConfigs() as $value_8) {
                $values_8[] = null === $value_8 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_8, 'json', $context));
            }
            $dataArray['Configs'] = $values_8;
        }
        if ($data->isInitialized('isolation') && null !== $data->getIsolation()) {
            $dataArray['Isolation'] = $data->getIsolation();
        }
        if ($data->isInitialized('init') && null !== $data->getInit()) {
            $dataArray['Init'] = $data->getInit();
        }
        if ($data->isInitialized('sysctls') && null !== $data->getSysctls()) {
            $values_9 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getSysctls() as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $dataArray['Sysctls'] = $values_9;
        }
        if ($data->isInitialized('capabilityAdd') && null !== $data->getCapabilityAdd()) {
            $values_10 = [];
            foreach ($data->getCapabilityAdd() as $value_10) {
                $values_10[] = $value_10;
            }
            $dataArray['CapabilityAdd'] = $values_10;
        }
        if ($data->isInitialized('capabilityDrop') && null !== $data->getCapabilityDrop()) {
            $values_11 = [];
            foreach ($data->getCapabilityDrop() as $value_11) {
                $values_11[] = $value_11;
            }
            $dataArray['CapabilityDrop'] = $values_11;
        }
        if ($data->isInitialized('ulimits') && null !== $data->getUlimits()) {
            $values_12 = [];
            foreach ($data->getUlimits() as $value_12) {
                $values_12[] = null === $value_12 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_12, 'json', $context));
            }
            $dataArray['Ulimits'] = $values_12;
        }
        foreach ($data->additionalPropertyEntries() as $key_2 => $value_13) {
            if (preg_match('/.*/', (string) $key_2)) {
                $dataArray[$key_2] = $value_13;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskSpecContainerSpec::class => false];
    }
}
