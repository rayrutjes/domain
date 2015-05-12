<?php

namespace RayRutjes\Domain\ValueObject\Number;

use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject;

class IntegerObject implements ValueObject
{
    /**
     * @var int
     */
    private $integer;

    /**
     * @param $integer
     *
     * @return IntegerObject
     */
    final public static function fromNativeInteger($integer)
    {
        if (!is_int($integer)) {
            throw new AssertionFailedException('Native integer expected.');
        }

        return new static($integer);
    }

    /**
     * @param int $integer
     */
    final private function __construct($integer)
    {
        $this->integer = $integer;
    }

    /**
     * @return int
     */
    final public function toNativeInteger()
    {
        return $this->integer;
    }

    /**
     * @param ValueObject $other
     *
     * @return bool
     */
    final public function sameValueAs(ValueObject $other)
    {
        $className = static::class;
        if (!$other instanceof $className) {
            return false;
        }
        return $this->toNativeString() === $other->toNativeString();
    }

    /**
     * @return string
     */
    final public function toNativeString()
    {
        return strval($this->toNativeInteger());
    }

    /**
     * @return string
     */
    final public function __toString()
    {
        return $this->toNativeString();
    }
}
