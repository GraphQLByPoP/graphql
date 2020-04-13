<?php

declare(strict_types=1);

namespace PoP\GraphQL\ObjectModels;

interface HasPossibleTypesTypeInterface
{
    public function getPossibleTypes(): array;
    public function getPossibleTypeIDs(): array;
}
