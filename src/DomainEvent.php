<?php

namespace RayRutjes\Domain;

interface DomainEvent
{
    /**
     * @return string
     */
    public function name();
}
