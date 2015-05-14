<?php

namespace RayRutjes\Domain\ValueObject;

interface ValueObject
{
    /**
     * @param ValueObject $other
     *
     * @return bool
     */
    public function sameValueAs(ValueObject $other);
}
