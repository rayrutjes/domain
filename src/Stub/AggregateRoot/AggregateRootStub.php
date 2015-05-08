<?php

namespace RayRutjes\Domain\Stub\AggregateRoot;

use RayRutjes\Domain\AggregateRoot\AbstractAggregateRoot;
use RayRutjes\Domain\Entity\Identifier;
use RayRutjes\Domain\ValueObject\Identity\Uuid;

class AggregateRootStub extends AbstractAggregateRoot
{
    /**
     * @return Identifier
     */
    public function id()
    {
        return Uuid::generate();
    }
}
