<?php

namespace spec\RayRutjes\Domain\ValueObject\String;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject\String\StringObject;

class StringObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('fromNativeString', ['string']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\String\StringObject');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject');
    }

    public function it_can_be_built_from_a_native_string()
    {
        $this->beConstructedThrough('fromNativeString', ['string']);

        $this->shouldThrow(new AssertionFailedException('Native string expected.'))->during('fromNativeString', [null]);
    }

    public function it_can_be_compared_with_another_string()
    {
        $same = StringObject::fromNativeString('string');
        $this->sameValueAs($same)->shouldReturn(true);

        $other = StringObject::fromNativeString('other');
        $this->sameValueAs($other)->shouldReturn(false);
    }

    public function it_can_be_translated_to_a_native_string()
    {
        $this->toNativeString()->shouldReturn('string');
        $this->__toString()->shouldReturn('string');
    }

    public function it_can_tell_if_the_string_is_empty()
    {
        $this->beConstructedThrough('fromNativeString', ['']);
        $this->isEmpty()->shouldReturn(true);
    }

    public function it_can_tell_if_the_string_is_not_empty()
    {
        $this->isEmpty()->shouldReturn(false);
    }
}
