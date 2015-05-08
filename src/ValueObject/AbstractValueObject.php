<?php

namespace RayRutjes\Domain\ValueObject;

use RayRutjes\Domain\ValueObject;

abstract class AbstractValueObject implements ValueObject
{
    /**
     * Simply comparing the classes so that every subclass of
     * this one has just to call the parent sameValueAs method
     * as a first check.
     *
     * @param ValueObject $other
     *
     * @return bool
     */
    public function sameValueAs(ValueObject $other)
    {
        return get_class($this) === get_class($other);
    }
}
