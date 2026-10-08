<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class AttestationStatement implements AdditionalPropertiesInterface
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
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor|null
     */
    protected $descriptor;
    /**
     * The in-toto predicate type URI of this statement.
     *
     * @var string|null
     */
    protected $predicateType;
    /**
     * The verbatim in-toto statement JSON. Only included when the caller
     * opts in via the `statement=true` query parameter; otherwise absent.
     *
     * @var array<string, mixed>|null
     */
    protected $statement;

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function getDescriptor(): ?OCIDescriptor
    {
        return $this->descriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function setDescriptor(?OCIDescriptor $descriptor): self
    {
        $this->initialized['descriptor'] = true;
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * The in-toto predicate type URI of this statement.
     */
    public function getPredicateType(): ?string
    {
        return $this->predicateType;
    }

    /**
     * The in-toto predicate type URI of this statement.
     */
    public function setPredicateType(?string $predicateType): self
    {
        $this->initialized['predicateType'] = true;
        $this->predicateType = $predicateType;

        return $this;
    }

    /**
     * The verbatim in-toto statement JSON. Only included when the caller
     * opts in via the `statement=true` query parameter; otherwise absent.
     *
     * @return array<string, mixed>|null
     */
    public function getStatement(): ?iterable
    {
        return $this->statement;
    }

    /**
     * The verbatim in-toto statement JSON. Only included when the caller
     * opts in via the `statement=true` query parameter; otherwise absent.
     *
     * @param array<string, mixed>|null $statement
     */
    public function setStatement(?iterable $statement): self
    {
        $this->initialized['statement'] = true;
        $this->statement = $statement;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['descriptor' => ['Descriptor', 'getDescriptor', 'setDescriptor'], 'predicateType' => ['PredicateType', 'getPredicateType', 'setPredicateType'], 'statement' => ['Statement', 'getStatement', 'setStatement']];
    }
}
