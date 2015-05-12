<?php

namespace RayRutjes\Domain\ValueObject\String;

use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject;

class StringObject implements ValueObject
{
    /**
     * @var string
     */
    private $string;

    /**
     * @param string $nativeString
     *
     * @return StringObject
     */
    final public static function fromNativeString($nativeString)
    {
        return new static($nativeString);
    }

    /**
     * @param string $nativeString
     */
    final private function __construct($nativeString)
    {
        if (!is_string($nativeString)) {
            throw new AssertionFailedException('Native string expected.');
        }
        $this->string = $nativeString;
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
