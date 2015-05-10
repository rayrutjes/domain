<?php

namespace RayRutjes\Domain\ValueObject\String;

use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject;
use RayRutjes\Domain\ValueObject\AbstractValueObject;

class String extends AbstractValueObject
{
    /**
     * @var string
     */
    private $string;

    /**
     * @param $string
     *
     * @return String
     */
    final public static function fromNativeString($string)
    {
        return new static($string);
    }

    /**
     * @param string $string
     */
    final private function __construct($string)
    {
        if (!is_string($string)) {
            throw new AssertionFailedException('Native string expected.');
        }
        $this->string = $string;
    }

    /**
     * @return bool
     */
    final public function isEmpty()
    {
        return empty($this->toNativeString());
    }

    /**
     * @param ValueObject $other
     *
     * @return bool
     */
    final public function sameValueAs(ValueObject $other)
    {
        return  parent::sameValueAs($other)
                && strcmp($this->toNativeString(), $other->toNativeString()) === 0;
    }

    /**
     * @return string
     */
    final public function toNativeString()
    {
        return $this->string;
    }
    /**
     * @return string
     */
    final public function __toString()
    {
        return $this->toNativeString();
    }
}
