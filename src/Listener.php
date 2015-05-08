<?php

namespace RayRutjes\Domain;

interface Listener
{
    /**
     * @param DomainEvent $event
     */
    public function handle(DomainEvent $event);
}
