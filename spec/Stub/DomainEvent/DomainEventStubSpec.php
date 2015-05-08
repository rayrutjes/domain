<?php

namespace spec\RayRutjes\Domain\Stub\DomainEvent;

use PhpSpec\ObjectBehavior;

class DomainEventStubSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\Stub\DomainEvent\DomainEventStub');
        $this->shouldHaveType('RayRutjes\Domain\DomainEvent');
    }

    public function it_should_know_its_name()
    {
        $this->getName()->shouldReturn('RayRutjes\Domain\Stub\DomainEvent\DomainEventStub');
    }
}
