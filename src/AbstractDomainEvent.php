<?php

namespace RayRutjes\Domain;

use DateTime;
use LogicException;

abstract class AbstractDomainEvent implements DomainEvent
{
    /**
     * @var DateTime
     */
    private $occurredOn;

    public function __construct()
    {
        $this->occurredOn = new DateTime();
    }

    /**
     * @return DateTime
     */
    public function occurredOn()
    {
        if (null === $this->occurredOn) {
            throw new LogicException('AbstractDomainEvent::__construct has to be called when subclassed.');
        }

        return clone $this->occurredOn;
    }
}
