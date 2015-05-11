<?php

namespace RayRutjes\Domain\ValueObject\Number;

use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject;
use RayRutjes\Domain\ValueObject\AbstractValueObject;

class NaturalIncludingZero extends AbstractValueObject
{
    /**
     * @var Integer
     */
    private $natural;

    /**
     * @param $nativeInteger
     *
     * @return NaturalIncludingZero
     */
    final public static function fromNativeInteger($nativeInteger)
    {
        $integer = Integer::fromNativeInteger($nativeInteger);

        return new static($integer);
    }

    /**
     * @param Integer $integer
     *
     * @return NaturalIncludingZero
     */
    final public static function fromInteger(Integer $integer)
    {
        return new static($integer);
    }

    /**
     * @param Integer $integer
     */
    final protected function __construct(Integer $integer)
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
        return  parent::sameValueAs($other)
        && $this->toNativeInteger() === $other->toNativeInteger();
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
