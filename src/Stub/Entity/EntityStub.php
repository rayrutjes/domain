<?php

namespace RayRutjes\Domain\Stub\Entity;

use RayRutjes\Domain\Entity\AbstractEntity;
use RayRutjes\Domain\Entity\Identifier;
use RayRutjes\Domain\Stub\Identifier\IdentifierStub;
use Rhumsaa\Uuid\Uuid;

class EntityStub extends AbstractEntity
{
    /**
     * @return Identifier
     */
    public function id()
    {
        return IdentifierStub::fromNativeString(Uuid::NIL);
    }
}
