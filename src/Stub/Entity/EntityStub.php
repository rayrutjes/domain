<?php

namespace RayRutjes\Domain\Stub\Entity;

use RayRutjes\Domain\Entity\AbstractEntity;
use RayRutjes\Domain\Entity\Identifier;
use RayRutjes\Domain\ValueObject\Identity\Uuid;

class EntityStub extends AbstractEntity
{
    /**
     * @return Identifier
     */
    public function id()
    {
        return Uuid::fromNativeString(\Rhumsaa\Uuid\Uuid::NIL);
    }
}
