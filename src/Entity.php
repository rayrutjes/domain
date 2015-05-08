<?php

namespace RayRutjes\Domain;

interface Entity
{
    /**
     * @return Identifier
     */
    public function id();

    /**
     * @param Entity $other
     *
     * @return bool
     */
    public function sameIdentityAs(Entity $other);
}
