<?php

namespace RayRutjes\Domain\Stub;

use RayRutjes\Domain\AbstractDomainEvent;

class DomainEventStub extends AbstractDomainEvent
{
    /**
     * @param bool $callParentConstructor
     */
    public function __construct($callParentConstructor = true)
    {
        if (true === $callParentConstructor) {
            parent::__construct();
        }
    }
}
