<?php

namespace spec\RayRutjes\Domain\ValueObject\Number;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject\Number\IntegerObject;
use RayRutjes\Domain\ValueObject\Number\NaturalIncludingZero;

class NaturalIncludingZeroSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('fromNativeInteger', [10]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Number\NaturalIncludingZero');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject');
    }

    public function it_can_be_built_from_a_native_integer()
    {
        $this->beConstructedThrough('fromNativeInteger', [10]);
        $this->toNativeInteger()->shouldReturn(10);
    }

    public function it_can_be_built_from_an_integer()
    {
        $integer = IntegerObject::fromNativeInteger(10);
        $this->beConstructedThrough('fromInteger', [$integer]);
        $this->toNativeInteger()->shouldReturn(10);
    }

    public function it_can_not_be_lower_than_zero()
    {
        $this->beConstructedThrough('fromNativeInteger', [0]);

        $this->shouldThrow(new AssertionFailedException('An integer greater or equal to 0 is expected.'))->during('fromNativeInteger', [-5]);
    }

    public function it_can_be_compared_with_another_natural_including_zero()
    {
        $same = NaturalIncludingZero::fromNativeInteger(10);
        $this->sameValueAs($same)->shouldReturn(true);

        $other = NaturalIncludingZero::fromNativeInteger(20);
        $this->sameValueAs($other)->shouldReturn(false);
    }

    public function it_can_be_translated_to_a_native_integer()
    {
        $this->toNativeInteger()->shouldReturn(10);
    }

    public function it_can_be_translated_to_a_native_string()
    {
        $this->toNativeString()->shouldReturn('10');
        $this->__toString()->shouldReturn('10');
    }
}
