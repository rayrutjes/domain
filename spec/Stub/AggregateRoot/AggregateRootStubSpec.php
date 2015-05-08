<?php

namespace spec\RayRutjes\Domain\Stub\AggregateRoot;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\DomainEvent;

class AggregateRootStubSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\Stub\AggregateRoot\AggregateRootStub');
    }

    public function it_should_provide_an_identifier()
    {
        $this->id()->shouldHaveType('RayRutjes\Domain\Identifier');
    }

    public function it_should_release_all_raised_events(DomainEvent $event1, DomainEvent $event2)
    {
        $this->raiseEvent($event1);
        $this->raiseEvent($event2);
        $this->raiseEvent($event1);

        $this->releaseEvents()->shouldReturn([
            $event1,
            $event2,
            $event1,
        ]);
    }

    public function it_should_clear_raised_events_when_released(DomainEvent $event1)
    {
        $this->raiseEvent($event1);
        $this->releaseEvents();
        $this->releaseEvents()->shouldReturn([]);
    }
}
