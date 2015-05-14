<?php

namespace RayRutjes\Domain;

abstract class AbstractAggregateRoot implements AggregateRoot
{
    /**
     * @var array
     */
    private $recordedEvents = [];

    /**
     * @param Entity $other
     *
     * @return bool
     */
    public function sameIdentityAs(Entity $other)
    {
        return $this->id()->sameValueAs($other->id());
    }

    /**
     * @param DomainEvent $event
     */
    public function recordEvent(DomainEvent $event)
    {
        $this->recordedEvents[] = $event;
    }

    /**
     * @return array
     */
    public function pullRecordedEvents()
    {
        $events = $this->recordedEvents;
        $this->recordedEvents = [];

        return $events;
    }
}
