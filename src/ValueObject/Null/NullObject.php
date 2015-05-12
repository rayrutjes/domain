<?php

namespace RayRutjes\Domain\ValueObject\Null;

use RayRutjes\Domain\ValueObject;

final class NullObject implements ValueObject
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
    public function toNativeString()
    {
        return strval(null);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toNativeString();
    }
}
