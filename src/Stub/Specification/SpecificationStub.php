<?php

namespace RayRutjes\Domain\Stub\Specification;

use RayRutjes\Domain\Specification\AbstractSpecification;

class SpecificationStub extends AbstractSpecification
{
    /**
     * @param $object
     *
     * @return bool
     */
    public function isSatisfiedBy($object)
    {
        return true;
    }
}
