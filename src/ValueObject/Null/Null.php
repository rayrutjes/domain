<?php

namespace RayRutjes\Domain\ValueObject\Null;

use RayRutjes\Domain\ValueObject\AbstractValueObject;

class Null extends AbstractValueObject
{
    final public function __construct()
    {
    }

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
