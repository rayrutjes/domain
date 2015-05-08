<?php

namespace RayRutjes\Domain\DomainEvent;

use RayRutjes\Domain\DomainEvent;

abstract class AbstractDomainEvent implements DomainEvent
{
    /**
     * @return string
     */
    public function getName()
    {
        return get_called_class();
    }
}
