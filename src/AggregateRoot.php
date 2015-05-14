<?php

namespace RayRutjes\Domain;

interface AggregateRoot extends Entity
{
    /**
     * @return Identifier
     */
    public function id();

    /**
     * @param DomainEvent $event
     */
    public function recordEvent(DomainEvent $event);

    /**
     * @return array
     */
    public function pullRecordedEvents();
}
