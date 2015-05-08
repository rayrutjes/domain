<?php

namespace spec\RayRutjes\Domain\Stub\Specification;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\Specification;
use stdClass;

class SpecificationStubSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\Stub\Specification\SpecificationStub');
        $this->shouldHaveType('RayRutjes\Domain\Specification');
    }

    public function it_can_be_chained_with_an_and_specification(Specification $specification)
    {
        $this->and_($specification)->shouldHaveType('RayRutjes\Domain\Specification\AndSpecification');
    }

    public function it_can_be_chained_with_an_or_specification(Specification $specification)
    {
        $this->or_($specification)->shouldHaveType('RayRutjes\Domain\Specification\OrSpecification');
    }

    public function it_can_be_chained_with_a_not_specification(Specification $specification)
    {
        $this->not_($specification)->shouldHaveType('RayRutjes\Domain\Specification\NotSpecification');
    }

    public function it_checks_if_the_specification_is_satisfied_and_returns_a_boolean()
    {
        $this->isSatisfiedBy(new stdClass())->shouldReturn(true);
    }
}
