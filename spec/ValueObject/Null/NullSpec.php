<?php

namespace spec\RayRutjes\Domain\ValueObject\Null;

use PhpSpec\ObjectBehavior;

class NullSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Null\Null');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject');
    }

    public function it_can_be_translated_to_a_native_empty_string()
    {
        $this->toNativeString()->shouldReturn('');
        $this->__toString()->shouldReturn('');
    }
}
