<?php

namespace RayRutjes\Domain\ValueObject\Null;

use RayRutjes\Domain\ValueObject\ValueObject;

final class Null implements ValueObject
{
    public function __construct()
    {
    }

    /**
     * @param ValueObject $other
     *
     * @return bool
     */
    public function sameValueAs(ValueObject $other)
    {
        return $other instanceof self;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return '';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}
