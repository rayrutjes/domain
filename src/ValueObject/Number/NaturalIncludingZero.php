<?php

namespace RayRutjes\Domain\ValueObject\Number;

use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject;

class NaturalIncludingZero implements ValueObject
{
    /**
     * @var IntegerObject
     */
    private $natural;

    /**
     * @param int $nativeInteger
     *
     * @return NaturalIncludingZero
     */
    final public static function fromNativeInteger($nativeInteger)
    {
        $integer = IntegerObject::fromNativeInteger($nativeInteger);

        return new static($integer);
    }

    /**
     * @param IntegerObject $integer
     *
     * @return NaturalIncludingZero
     */
    final public static function fromInteger(IntegerObject $integer)
    {
        return new static($integer);
    }

    /**
     * @param IntegerObject $integer
     */
    final private function __construct(IntegerObject $integer)
    {
        if ($integer->toNativeInteger() < 0) {
            throw new AssertionFailedException('An integer greater or equal to 0 is expected.');
        };
        $this->natural = $integer;
    }

    /**
     * @return int
     */
    final public function toNativeInteger()
    {
        return $this->natural->toNativeInteger();
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
        return $this->toNativeInteger() === $other->toNativeInteger();
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
