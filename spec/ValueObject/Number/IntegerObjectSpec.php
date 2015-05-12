<?php

namespace spec\RayRutjes\Domain\ValueObject\Number;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject\Number\IntegerObject;

class IntegerObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('fromNativeInteger', [10]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Number\IntegerObject');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject');
    }

    public function it_can_be_built_from_a_native_integer()
    {
        $this->beConstructedThrough('fromNativeInteger', [-17]);

        $this->shouldThrow(new AssertionFailedException('Native integer expected.'))->during('fromNativeInteger', [null]);
        $this->shouldThrow(new AssertionFailedException('Native integer expected.'))->during('fromNativeInteger', [12.3]);
        $this->shouldThrow(new AssertionFailedException('Native integer expected.'))->during('fromNativeInteger', ['12.3']);
        $this->shouldThrow(new AssertionFailedException('Native integer expected.'))->during('fromNativeInteger', ['12']);
        $this->shouldThrow(new AssertionFailedException('Native integer expected.'))->during('fromNativeInteger', [true]);
    }

    public function it_can_be_compared_with_another_integer()
    {
        $same = IntegerObject::fromNativeInteger(10);
        $this->sameValueAs($same)->shouldReturn(true);

        $other = IntegerObject::fromNativeInteger(20);
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
