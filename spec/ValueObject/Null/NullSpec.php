<?php

namespace spec\RayRutjes\Domain\ValueObject\Null;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\ValueObject\ValueObject;
use RayRutjes\Domain\ValueObject\Null\Null;

class NullSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Null\Null');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\ValueObject');
    }

    public function it_can_be_compared_with_another_null(ValueObject $valueObject)
    {
        $this->sameValueAs($valueObject)->shouldReturn(false);

        $same = new Null();
        $this->sameValueAs($same)->shouldReturn(true);
    }

    public function it_can_be_translated_to_a_string()
    {
        $this->toString()->shouldReturn('');
        $this->__toString()->shouldReturn('');
    }
}
