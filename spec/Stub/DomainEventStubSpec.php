<?php

namespace spec\RayRutjes\Domain\Stub;

use LogicException;
use PhpSpec\ObjectBehavior;

class DomainEventStubSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\Stub\DomainEventStub');
        $this->shouldHaveType('RayRutjes\Domain\DomainEvent');
    }

    public function it_should_know_when_it_occurred()
    {
        $this->occurredOn()->shouldHaveType('\DateTime');
    }

    public function it_should_throw_an_error_if_it_incorrectly_subclasses()
    {
        $this->beConstructedWith(false);
        $this->shouldThrow(new LogicException('AbstractDomainEvent::__construct has to be called when subclassed.'))->during('occurredOn');
    }
}
