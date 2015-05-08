<?php

namespace spec\RayRutjes\Domain\ValueObject\Number;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\DomainException\AssertionFailedException;

class NaturalIncludingZeroSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('fromNativeInteger', [10]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Number\NaturalIncludingZero');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Number\NaturalExcludingZero');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject');
    }

    public function it_should_allow_zero()
    {
        $this->beConstructedThrough('fromNativeInteger', [0]);
        $this->toNativeString()->shouldReturn('0');
        $this->toNativeInteger()->shouldReturn(0);

        $this->shouldThrow(new AssertionFailedException('An integer greater or equal to 0 is expected.'))->during('fromNativeInteger', [-5]);
    }
}
