<?php

namespace RayRutjes\Domain\ValueObject\Web;

use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject;
use RayRutjes\Domain\ValueObject\String\StringObject;

class EmailAddress implements ValueObject
{
    /**
     * @var String
     */
    private $email;

    /**
     * @param string $nativeString
     *
     * @return EmailAddress
     */
    final public static function fromNativeString($nativeString)
    {
        $string = StringObject::fromNativeString($nativeString);

        return self::fromString($string);
    }

    /**
     * @param StringObject $string
     *
     * @return EmailAddress
     */
    final public static function fromString(StringObject $string)
    {
        return new static($string);
    }

    /**
     * @param StringObject $string
     */
    final public function __construct(StringObject $string)
    {
        if (!filter_var($string->toNativeString(), FILTER_VALIDATE_EMAIL)) {
            throw new AssertionFailedException('Misformatted email address.');
        }
        $this->email = $string;
    }

    /**
     * @return string
     */
    final public function toNativeString()
    {
        return $this->email->toNativeString();
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
    final public function __toString()
    {
        return $this->toNativeString();
    }
}
