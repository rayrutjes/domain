<?php

namespace spec\RayRutjes\Domain\Stub\Entity;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\Entity;
use RayRutjes\Domain\Stub\Identifier\IdentifierStub;

class EntityStubSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\Stub\Entity\EntityStub');
        $this->shouldHaveType('RayRutjes\Domain\Entity');
    }

    public function it_should_provide_an_identifier()
    {
        $this->id()->shouldHaveType('RayRutjes\Domain\Identifier');
    }

    public function it_identity_can_be_compared_with_another_entity(Entity $other)
    {
        $randomUuid = IdentifierStub::generate();
        $other->id()->willReturn($randomUuid);
        $this->sameIdentityAs($other)->shouldReturn(false);

        $nilUuid = IdentifierStub::fromNativeString(\Rhumsaa\Uuid\Uuid::NIL);
        $other->id()->willReturn($nilUuid);
        $this->sameIdentityAs($other)->shouldReturn(true);
    }
}
