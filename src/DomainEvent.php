<?php

namespace RayRutjes\Domain;

interface DomainEvent
{
    /**
     * @return \DateTime
     */
    public function occurredOn();
}
