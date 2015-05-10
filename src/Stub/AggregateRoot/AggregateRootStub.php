<?php

namespace RayRutjes\Domain\Stub\AggregateRoot;

use RayRutjes\Domain\AggregateRoot\AbstractAggregateRoot;
use RayRutjes\Domain\Stub\Identifier\IdentifierStub;

class AggregateRootStub extends AbstractAggregateRoot
{
    /**
     * @return Identifier
     */
    public function id()
    {
        return IdentifierStub::generate();
    }
}
