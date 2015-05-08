<?php

namespace RayRutjes\Domain;

interface ValueObject
{
    /**
     * @param ValueObject $other
     *
     * @return bool
     */
    public function sameValueAs(ValueObject $other);
}
