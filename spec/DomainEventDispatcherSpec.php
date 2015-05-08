<?php

namespace spec\RayRutjes\Domain;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\AggregateRoot;
use RayRutjes\Domain\DomainEvent;
use RayRutjes\Domain\Listener;

class DomainEventDispatcherSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\DomainEventDispatcher');
    }

    public function it_should_delegate_event_handling_to_listeners(
        AggregateRoot $aggregateRoot,
        DomainEvent $event1,
        DomainEvent $event2,
        Listener $listener1,
        Listener $listener2
    ) {
        $this->addListener('event1', $listener1);
        $listener1->handle($event1)->shouldBeCalledTimes(1);
        $listener1->handle($event2)->shouldNotBeCalled();

        $this->addListener('event1', $listener2);
        $this->addListener('event2', $listener2);
        $listener2->handle($event1)->shouldBeCalledTimes(1);
        $listener2->handle($event2)->shouldBeCalledTimes(1);

        $aggregateRoot->releaseEvents()->shouldBeCalled()->willReturn([$event1, $event2]);

        $event1->getName()->shouldBeCalled()->willReturn('event1');
        $event2->getName()->shouldBeCalled()->willReturn('event2');

        $this->releaseAndDispatchAggregateEvents($aggregateRoot);
    }

    public function it_should_not_raise_any_errors_if_no_listeners_are_listening_for_a_dispatched_event(
        AggregateRoot $aggregateRoot,
        DomainEvent $event1
    ) {
        $aggregateRoot->releaseEvents()->shouldBeCalled()->willReturn([$event1]);

        $event1->getName()->shouldBeCalled()->willReturn('event1');

        $this->releaseAndDispatchAggregateEvents($aggregateRoot);
    }
}
