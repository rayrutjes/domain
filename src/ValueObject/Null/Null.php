<?php

namespace RayRutjes\Domain\ValueObject\Null;

use RayRutjes\Domain\ValueObject\AbstractValueObject;

final class Null extends AbstractValueObject
{
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
