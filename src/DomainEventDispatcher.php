<?php

namespace RayRutjes\Domain;

class DomainEventDispatcher
{
    private $listeners = [];

    /**
     * @param $eventName
     * @param Listener $listener
     */
    public function addListener($eventName, Listener $listener)
    {
        if (!array_key_exists($eventName, $this->listeners)) {
            $this->listeners[$eventName] = [];
        }
        $this->listeners[$eventName][] = $listener;
    }

    /**
     * @param DomainEvent $event
     *
     * @return array
     */
    private function getListenersForEvent(DomainEvent $event)
    {
        if (!array_key_exists($event->getName(), $this->listeners)) {
            return [];
        }

        return $this->listeners[$event->getName()];
    }

    /**
     * @param AggregateRoot $aggregateRoot
     */
    public function releaseAndDispatchAggregateEvents(AggregateRoot $aggregateRoot)
    {
        $events = $aggregateRoot->releaseEvents();
        foreach ($events as $event) {
            $this->dispatch($event);
        }
    }

    /**
     * @param DomainEvent $event
     */
    private function dispatch(DomainEvent $event)
    {
        $listeners = $this->getListenersForEvent($event);
        foreach ($listeners as $listener) {
            $listener->handle($event);
        }
    }
}
