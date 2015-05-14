<?php

namespace RayRutjes\Domain;

interface Entity
{
    /**
     * @param Entity $other
     *
     * @return bool
     */
    public function sameIdentityAs(Entity $other);
}
