<?php

namespace RayRutjes\Domain;

interface AggregateRoot extends Entity
{
    /**
     * @param DomainEvent $event
     */
    public function raiseEvent(DomainEvent $event);

    /**
     * @return array
     */
    public function releaseEvents();
}
