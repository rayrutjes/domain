<?php

namespace RayRutjes\Domain\ValueObject\Identity;

use DomainException;
use RayRutjes\Domain\ValueObject;

class Uuid implements ValueObject
{
    /**
     * @var \Rhumsaa\Uuid\Uuid
     */
    private $uuid;

    /**
     * @param string $uuid
     *
     * @return Uuid
     */
    final public static function fromNativeString($uuid)
    {
        if (!\Rhumsaa\Uuid\Uuid::isValid($uuid)) {
            throw new DomainException('Invalid Uuid format');
        }

        return new static(\Rhumsaa\Uuid\Uuid::fromString($uuid));
    }

    /**
     * @return Uuid
     */
    final public static function generate()
    {
        return new static(\Rhumsaa\Uuid\Uuid::uuid4());
    }

    /**
     * @param \Rhumsaa\Uuid\Uuid $uuid
     */
    final public function __construct(\Rhumsaa\Uuid\Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @param ValueObject $other
     *
     * @return bool
     */
    final public function sameValueAs(ValueObject $other)
    {
        if (!$other instanceof self) {
            return false;
        }

        return $this->uuid->equals($other->uuid);
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
