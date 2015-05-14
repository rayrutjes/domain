<?php

namespace spec\RayRutjes\Domain;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\AbstractDomainEvent;
use RayRutjes\Domain\DomainEvent;
use RayRutjes\Domain\DomainEventSubscriber;

class DomainEventPublisherSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\DomainEventPublisher');
    }

    public function it_should_publish_events_to_subscribers(
        DomainEventSubscriber $subscriber1,
        DomainEventSubscriber $subscriber2)
    {
        $subscriber1->subscribedToEventType()->willReturn('spec\RayRutjes\Domain\Test1DomainEvent');
        $subscriber2->subscribedToEventType()->willReturn('spec\RayRutjes\Domain\Test2DomainEvent');
        $this->subscribe($subscriber1);
        $this->subscribe($subscriber2);

        $event = new Test1DomainEvent();
        $subscriber1->handleEvent($event)->shouldBeCalledTimes(1);
        $subscriber2->handleEvent($event)->shouldNotBeCalled();
        $this->publish(new Test1DomainEvent());
    }

    public function it_can_publish_multiple_events_at_a_time(
        DomainEventSubscriber $subscriber1,
        DomainEventSubscriber $subscriber2)
    {
        $subscriber1->subscribedToEventType()->willReturn('spec\RayRutjes\Domain\Test1DomainEvent');
        $subscriber2->subscribedToEventType()->willReturn('spec\RayRutjes\Domain\Test2DomainEvent');
        $this->subscribe($subscriber1);
        $this->subscribe($subscriber2);

        $event1 = new Test1DomainEvent();
        $event2 = new Test2DomainEvent();
        $subscriber1->handleEvent($event1)->shouldBeCalledTimes(1);
        $subscriber2->handleEvent($event2)->shouldBeCalledTimes(1);
        $this->publishAll([$event1, $event2]);
    }

    public function it_should_publish_event_if_it_is_a_parent_of_the_subscribed_event(
        DomainEventSubscriber $subscriber1)
    {
        $subscriber1->subscribedToEventType()->willReturn('RayRutjes\Domain\DomainEvent');
        $this->subscribe($subscriber1);

        $event1 = new Test1DomainEvent();
        $event2 = new Test2DomainEvent();
        $subscriber1->handleEvent($event1)->shouldBeCalledTimes(1);
        $subscriber1->handleEvent($event2)->shouldBeCalledTimes(1);
        $this->publishAll([$event1, $event2]);
    }
}

class Test1DomainEvent extends AbstractDomainEvent {

}

class Test2DomainEvent extends AbstractDomainEvent {

}
