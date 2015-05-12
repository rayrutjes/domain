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
        $this->name()->shouldReturn('RayRutjes\Domain\Stub\DomainEvent\DomainEventStub');
    }

    public function it_should_know_when_it_has_been_raised()
    {
        $this->raisedAt()->shouldHaveType('\DateTime');
    }

    public function it_should_raise_an_error_if_incorrectly_extended()
    {
        $this->beConstructedWith(false);
        $this->shouldThrow(new \LogicException('When extending AbstractDomainEvent you need to call the parent::__construct.'))->during('raisedAt');
    }
}
