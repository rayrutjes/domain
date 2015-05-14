<?php

namespace RayRutjes\Domain;

final class DomainEventPublisher
{
    /**
     * @var array
     */
    private $subscribers = [];

    /**
     * @param DomainEventSubscriber $subscriber
     */
    public function subscribe(DomainEventSubscriber $subscriber)
    {
        $this->subscribers[] = $subscriber;
    }

    /**
     * @param DomainEvent $event
     */
    public function publish(DomainEvent $event)
    {
        foreach ($this->subscribers as $subscriber) {
            $handledEvent = $subscriber->subscribedToEventType();

            if (!$event instanceof $handledEvent) {
                continue;
            }
            $subscriber->handleEvent($event);
        }
    }

    /**
     * @param array $events
     */
    public function publishAll(array $events)
    {
        foreach ($events as $event) {
            $this->publish($event);
        }
    }
}
