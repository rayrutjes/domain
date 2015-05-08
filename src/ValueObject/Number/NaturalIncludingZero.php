<?php

namespace RayRutjes\Domain\ValueObject\Number;

use RayRutjes\Domain\DomainException\AssertionFailedException;

/**
 * By letting NaturalIncludingZero extending NaturalExcludingZero we respect the LSP,
 * NaturalIncludingZero being less restrictive than it's parent.
 */
class NaturalIncludingZero extends NaturalExcludingZero
{
    /**
     * @param Integer $integer
     */
    final protected function __construct(Integer $integer)
    {
        if ($integer->toNativeInteger() < 0) {
            throw new AssertionFailedException('An integer greater or equal to 0 is expected.');
        };
        $this->natural = $integer;
    }
}
