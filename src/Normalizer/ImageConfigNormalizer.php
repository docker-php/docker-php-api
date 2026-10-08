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

class ImageConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ImageConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ImageConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ImageConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('ArgsEscaped', $data) && \is_int($data['ArgsEscaped'])) {
            $data['ArgsEscaped'] = (bool) $data['ArgsEscaped'];
        }
        if (\array_key_exists('User', $data) && null !== $data['User']) {
            $object->setUser($data['User']);
            unset($data['User']);
        } elseif (\array_key_exists('User', $data) && null === $data['User']) {
            $object->setUser(null);
            unset($data['User']);
        }
        if (\array_key_exists('ExposedPorts', $data) && null !== $data['ExposedPorts']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['ExposedPorts'] as $key => $value) {
                $values_1 = new \Docker\API\Runtime\JsonObject();
                foreach ($value as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $values[$key] = $values_1;
            }
            $object->setExposedPorts($values);
            unset($data['ExposedPorts']);
        } elseif (\array_key_exists('ExposedPorts', $data) && null === $data['ExposedPorts']) {
            $object->setExposedPorts(null);
            unset($data['ExposedPorts']);
        }
        if (\array_key_exists('Env', $data) && null !== $data['Env']) {
            $values_2 = [];
            foreach ($data['Env'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setEnv($values_2);
            unset($data['Env']);
        } elseif (\array_key_exists('Env', $data) && null === $data['Env']) {
            $object->setEnv(null);
            unset($data['Env']);
        }
        if (\array_key_exists('Cmd', $data) && null !== $data['Cmd']) {
            $values_3 = [];
            foreach ($data['Cmd'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setCmd($values_3);
            unset($data['Cmd']);
        } elseif (\array_key_exists('Cmd', $data) && null === $data['Cmd']) {
            $object->setCmd(null);
            unset($data['Cmd']);
        }
        if (\array_key_exists('Healthcheck', $data) && null !== $data['Healthcheck']) {
            $object->setHealthcheck($this->denormalizer->denormalize($data['Healthcheck'], \Docker\API\Model\HealthConfig::class, 'json', $context));
            unset($data['Healthcheck']);
        } elseif (\array_key_exists('Healthcheck', $data) && null === $data['Healthcheck']) {
            $object->setHealthcheck(null);
            unset($data['Healthcheck']);
        }
        if (\array_key_exists('ArgsEscaped', $data) && null !== $data['ArgsEscaped']) {
            $object->setArgsEscaped($data['ArgsEscaped']);
            unset($data['ArgsEscaped']);
        } elseif (\array_key_exists('ArgsEscaped', $data) && null === $data['ArgsEscaped']) {
            $object->setArgsEscaped(null);
            unset($data['ArgsEscaped']);
        }
        if (\array_key_exists('Volumes', $data) && null !== $data['Volumes']) {
            $values_4 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Volumes'] as $key_2 => $value_4) {
                $values_5 = new \Docker\API\Runtime\JsonObject();
                foreach ($value_4 as $key_3 => $value_5) {
                    $values_5[$key_3] = $value_5;
                }
                $values_4[$key_2] = $values_5;
            }
            $object->setVolumes($values_4);
            unset($data['Volumes']);
        } elseif (\array_key_exists('Volumes', $data) && null === $data['Volumes']) {
            $object->setVolumes(null);
            unset($data['Volumes']);
        }
        if (\array_key_exists('WorkingDir', $data) && null !== $data['WorkingDir']) {
            $object->setWorkingDir($data['WorkingDir']);
            unset($data['WorkingDir']);
        } elseif (\array_key_exists('WorkingDir', $data) && null === $data['WorkingDir']) {
            $object->setWorkingDir(null);
            unset($data['WorkingDir']);
        }
        if (\array_key_exists('Entrypoint', $data) && null !== $data['Entrypoint']) {
            $values_6 = [];
            foreach ($data['Entrypoint'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setEntrypoint($values_6);
            unset($data['Entrypoint']);
        } elseif (\array_key_exists('Entrypoint', $data) && null === $data['Entrypoint']) {
            $object->setEntrypoint(null);
            unset($data['Entrypoint']);
        }
        if (\array_key_exists('OnBuild', $data) && null !== $data['OnBuild']) {
            $values_7 = [];
            foreach ($data['OnBuild'] as $value_7) {
                $values_7[] = $value_7;
            }
            $object->setOnBuild($values_7);
            unset($data['OnBuild']);
        } elseif (\array_key_exists('OnBuild', $data) && null === $data['OnBuild']) {
            $object->setOnBuild(null);
            unset($data['OnBuild']);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values_8 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Labels'] as $key_4 => $value_8) {
                $values_8[$key_4] = $value_8;
            }
            $object->setLabels($values_8);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
            unset($data['Labels']);
        }
        if (\array_key_exists('StopSignal', $data) && null !== $data['StopSignal']) {
            $object->setStopSignal($data['StopSignal']);
            unset($data['StopSignal']);
        } elseif (\array_key_exists('StopSignal', $data) && null === $data['StopSignal']) {
            $object->setStopSignal(null);
            unset($data['StopSignal']);
        }
        if (\array_key_exists('Shell', $data) && null !== $data['Shell']) {
            $values_9 = [];
            foreach ($data['Shell'] as $value_9) {
                $values_9[] = $value_9;
            }
            $object->setShell($values_9);
            unset($data['Shell']);
        } elseif (\array_key_exists('Shell', $data) && null === $data['Shell']) {
            $object->setShell(null);
            unset($data['Shell']);
        }
        foreach ($data as $key_5 => $value_10) {
            if (preg_match('/.*/', (string) $key_5)) {
                $object[$key_5] = $value_10;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('user') && null !== $data->getUser()) {
            $dataArray['User'] = $data->getUser();
        }
        if ($data->isInitialized('exposedPorts') && null !== $data->getExposedPorts()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getExposedPorts() as $key => $value) {
                $values_1 = new \Docker\API\Runtime\JsonObject();
                foreach ($value as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $values[$key] = $values_1;
            }
            $dataArray['ExposedPorts'] = $values;
        }
        if ($data->isInitialized('env') && null !== $data->getEnv()) {
            $values_2 = [];
            foreach ($data->getEnv() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['Env'] = $values_2;
        }
        if ($data->isInitialized('cmd') && null !== $data->getCmd()) {
            $values_3 = [];
            foreach ($data->getCmd() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['Cmd'] = $values_3;
        }
        if ($data->isInitialized('healthcheck') && null !== $data->getHealthcheck()) {
            $dataArray['Healthcheck'] = null === $data->getHealthcheck() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getHealthcheck(), 'json', $context));
        }
        if ($data->isInitialized('argsEscaped') && null !== $data->getArgsEscaped()) {
            $dataArray['ArgsEscaped'] = $data->getArgsEscaped();
        }
        if ($data->isInitialized('volumes') && null !== $data->getVolumes()) {
            $values_4 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getVolumes() as $key_2 => $value_4) {
                $values_5 = new \Docker\API\Runtime\JsonObject();
                foreach ($value_4 as $key_3 => $value_5) {
                    $values_5[$key_3] = $value_5;
                }
                $values_4[$key_2] = $values_5;
            }
            $dataArray['Volumes'] = $values_4;
        }
        if ($data->isInitialized('workingDir') && null !== $data->getWorkingDir()) {
            $dataArray['WorkingDir'] = $data->getWorkingDir();
        }
        if ($data->isInitialized('entrypoint') && null !== $data->getEntrypoint()) {
            $values_6 = [];
            foreach ($data->getEntrypoint() as $value_6) {
                $values_6[] = $value_6;
            }
            $dataArray['Entrypoint'] = $values_6;
        }
        if ($data->isInitialized('onBuild') && null !== $data->getOnBuild()) {
            $values_7 = [];
            foreach ($data->getOnBuild() as $value_7) {
                $values_7[] = $value_7;
            }
            $dataArray['OnBuild'] = $values_7;
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values_8 = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getLabels() as $key_4 => $value_8) {
                $values_8[$key_4] = $value_8;
            }
            $dataArray['Labels'] = $values_8;
        }
        if ($data->isInitialized('stopSignal') && null !== $data->getStopSignal()) {
            $dataArray['StopSignal'] = $data->getStopSignal();
        }
        if ($data->isInitialized('shell') && null !== $data->getShell()) {
            $values_9 = [];
            foreach ($data->getShell() as $value_9) {
                $values_9[] = $value_9;
            }
            $dataArray['Shell'] = $values_9;
        }
        foreach ($data->additionalPropertyEntries() as $key_5 => $value_10) {
            if (preg_match('/.*/', (string) $key_5)) {
                $dataArray[$key_5] = $value_10;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ImageConfig::class => false];
    }
}
