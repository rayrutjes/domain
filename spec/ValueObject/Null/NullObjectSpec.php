<?php

namespace spec\RayRutjes\Domain\ValueObject\Null;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\ValueObject;
use RayRutjes\Domain\ValueObject\Null\NullObject;
use RayRutjes\Domain\ValueObject\String\StringObject;
use stdClass;

class NullObjectSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Null\NullObject');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject');
    }

    public function it_can_be_translated_to_a_native_empty_string()
    {
        $this->toNativeString()->shouldReturn('');
        $this->__toString()->shouldReturn('');
    }

    public function it_can_be_compared_with_another_null_object(ValueObject $valueObject)
    {
        $same = new NullObject();
        $this->sameValueAs($same)->shouldReturn(true);

        $this->sameValueAs($valueObject)->shouldReturn(false);
    }
}
