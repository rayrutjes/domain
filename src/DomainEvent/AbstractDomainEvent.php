<?php

namespace RayRutjes\Domain\DomainEvent;

use DateTime;
use RayRutjes\Domain\DomainEvent;

abstract class AbstractDomainEvent implements DomainEvent
{
    /**
     * @var DateTime
     */
    private $raisedAt;

    public function __construct()
    {
        $this->raisedAt = new DateTime();
    }

    /**
     * @return string
     */
    public function name()
    {
        return get_called_class();
    }

    /**
     * @return DateTime
     */
    public function raisedAt()
    {
        if (null === $this->raisedAt) {
            throw new \LogicException('When extending AbstractDomainEvent you need to call the parent::__construct.');
        }

        return clone $this->raisedAt;
    }
}
