<?php

namespace RayRutjes\Domain\ValueObject\Identity;

use DomainException;
use RayRutjes\Domain\Identifier;
use RayRutjes\Domain\ValueObject;
use RayRutjes\Domain\ValueObject\AbstractValueObject;

class Uuid extends AbstractValueObject implements Identifier
{
    /**
     * @var \Rhumsaa\Uuid\Uuid
     */
    private $uuid;

    /**
     * @param \Rhumsaa\Uuid\Uuid $uuid
     */
    final public function __construct(\Rhumsaa\Uuid\Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @param string $uuid
     */
    final public static function fromNativeString($uuid)
    {
        if (!\Rhumsaa\Uuid\Uuid::isValid($uuid)) {
            throw new DomainException('Invalid Uuid format');
        }

        return new self(\Rhumsaa\Uuid\Uuid::fromString($uuid));
    }

    /**
     * @return Uuid
     */
    final public static function generate()
    {
        return new self(\Rhumsaa\Uuid\Uuid::uuid4());
    }

    /**
     * @param ValueObject $other
     *
     * @return bool
     */
    final public function sameValueAs(ValueObject $other)
    {
        return  parent::sameValueAs($other)
                && $this->uuid->equals($other->uuid);
    }

    /**
     * @return string
     */
    final public function toNativeString()
    {
        return $this->uuid->toString();
    }

    /**
     * @return string
     */
    final public function __toString()
    {
        return $this->toNativeString();
    }
}