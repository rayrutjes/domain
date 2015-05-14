<?php

namespace RayRutjes\Domain\Stub;

use RayRutjes\Domain\AbstractAggregateRoot;
use Rhumsaa\Uuid\Uuid;

class AggregateRootStub extends AbstractAggregateRoot
{
    /**
     * @return Identifier
     */
    public function id()
    {
        return new IdentifierStub(Uuid::NIL);
    }
}
