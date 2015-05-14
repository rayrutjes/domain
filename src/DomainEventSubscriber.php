<?php

namespace RayRutjes\Domain;

interface DomainEventSubscriber
{
    /**
     * @param DomainEvent $event
     *
     * @return mixed
     */
    public function handleEvent(DomainEvent $event);

    /**
     * Returns the fully qualified class name this is subscribed to.
     *
     * @return string
     */
    public function subscribedToEventType();
}
