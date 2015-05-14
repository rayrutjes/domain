<?php

namespace spec\RayRutjes\Domain\Stub;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\AggregateRoot;
use RayRutjes\Domain\DomainEvent;
use RayRutjes\Domain\Stub\IdentifierStub;

class AggregateRootStubSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\Stub\AggregateRootStub');
        $this->shouldHaveType('RayRutjes\Domain\AbstractAggregateRoot');
        $this->shouldHaveType('RayRutjes\Domain\AggregateRoot');
    }

    public function it_should_provide_an_identifier()
    {
        $this->id()->shouldHaveType('RayRutjes\Domain\Identifier');
    }

    public function it_pull_all_recorded_events(DomainEvent $event1, DomainEvent $event2)
    {
        $this->recordEvent($event1);
        $this->recordEvent($event2);
        $this->recordEvent($event1);

        $this->pullRecordedEvents()->shouldReturn([
            $event1,
            $event2,
            $event1,
        ]);
        $this->pullRecordedEvents()->shouldReturn([]);
    }

    public function its_identity_can_be_compared_with_another_aggregate_root(AggregateRoot $other)
    {
        $randomUuid = IdentifierStub::generate();
        $other->id()->willReturn($randomUuid);
        $this->sameIdentityAs($other)->shouldReturn(false);

        $nilUuid = new IdentifierStub(\Rhumsaa\Uuid\Uuid::NIL);
        $other->id()->willReturn($nilUuid);
        $this->sameIdentityAs($other)->shouldReturn(true);
    }
}
