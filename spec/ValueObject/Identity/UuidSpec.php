<?php

namespace spec\RayRutjes\Domain\ValueObject\Identity;

use DomainException;
use PhpSpec\ObjectBehavior;
use Rhumsaa\Uuid\Uuid;

class UuidSpec extends ObjectBehavior
{
    public function let()
    {
        $uuid = Uuid::fromString(Uuid::NIL);
        $this->beConstructedWith($uuid);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Identity\Uuid');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject');
    }

    public function it_can_be_built_from_a_native_string()
    {
        $this->beConstructedThrough('fromNativeString', [Uuid::NIL]);

        $this->shouldThrow(new DomainException('Invalid Uuid format'))->during('fromNativeString', ['not a valid uuid string']);
    }

    public function it_can_be_generated()
    {
        $this->beConstructedThrough('generate', []);
        $uuid1 = $this->toNativeString();

        // Todo: find a way of test for uniqueness, found no way yet to achieve it with phpspec, as it is not possible to re-instantiate itself
    }
    public function it_can_be_compared_with_another_uuid()
    {
        $nilUuid = \RayRutjes\Domain\ValueObject\Identity\Uuid::fromNativeString(Uuid::NIL);
        $this->sameValueAs($nilUuid)->shouldReturn(true);

        $randomUuid = \RayRutjes\Domain\ValueObject\Identity\Uuid::generate();
        $this->sameValueAs($randomUuid)->shouldReturn(false);
    }

    public function it_can_be_translated_to_a_native_string()
    {
        $this->toNativeString()->shouldReturn(Uuid::NIL);
        $this->__toString()->shouldReturn(Uuid::NIL);
    }
}
