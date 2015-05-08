<?php

namespace RayRutjes\Domain\AggregateRoot;

use RayRutjes\Domain\AggregateRoot as AggregateRootInterface;
use RayRutjes\Domain\DomainEvent;
use RayRutjes\Domain\Entity\AbstractEntity;

abstract class AbstractAggregateRoot extends AbstractEntity implements AggregateRootInterface
{
    /**
     * @var array
     */
    private $pendingEvents = [];

    /**
     * @param DomainEvent $event
     */
    public function raiseEvent(DomainEvent $event)
    {
        $this->pendingEvents[] = $event;
    }

    /**
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->pendingEvents;
        $this->pendingEvents = [];

        return $events;
    }
}
