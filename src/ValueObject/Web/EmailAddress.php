<?php

namespace RayRutjes\Domain\ValueObject\Web;

use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject;
use RayRutjes\Domain\ValueObject\AbstractValueObject;
use RayRutjes\Domain\ValueObject\String\String;

class EmailAddress extends AbstractValueObject
{
    /**
     * @var String
     */
    private $email;

    /**
     * @param String $email
     */
    final public function __construct(String $email)
    {
        if (!filter_var($email->toNativeString(), FILTER_VALIDATE_EMAIL)) {
            throw new AssertionFailedException('Misformatted email address.');
        }
        $this->email = $email;
    }

    /**
     * @param $email
     *
     * @return EmailAddress
     */
    final public static function fromNativeString($email)
    {
        $email = String::fromNativeString($email);

        return new static($email);
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
        return  parent::sameValueAs($other)
                && $this->email->sameValueAs($other->email);
    }

    /**
     * @return string
     */
    final public function __toString()
    {
        return $this->toNativeString();
    }
}
