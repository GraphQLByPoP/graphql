<?php
namespace PoP\GraphQL\ObjectModels;

use PoP\API\Schema\SchemaDefinition;
use PoP\GraphQL\Facades\Registries\TypeRegistryFacade;

class ObjectType extends AbstractType implements HasFieldsTypeInterface
{
    protected $fields;
    public function __construct(string $name)
    {
        parent::__construct($name);

        // Extract all the properties from the typeRegistry
        $typeRegistry = TypeRegistryFacade::getInstance();
        $typeDefinition = $typeRegistry->getTypeDefinition($name);
        $this->fields = array_keys($typeDefinition[SchemaDefinition::ARGNAME_FIELDS]);
    }

    public function getKind()
    {
        return TypeKinds::OBJECT;
    }

    public function getFields(bool $includeDeprecated = false): array
    {
        return $this->fields;
    }
}
