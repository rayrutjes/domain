<?php

namespace RayRutjes\Domain\Entity;

use RayRutjes\Domain\Entity as EntityInterface;

abstract class AbstractEntity implements EntityInterface
{
    /**
     * @return Identifier
     */
    abstract public function id();

    /**
     * @param EntityInterface $other
     *
     * @return bool
     */
    public function sameIdentityAs(EntityInterface $other)
    {
        return $this->id()->sameValueAs($other->id());
    }
}
