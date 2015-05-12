<?php

namespace spec\RayRutjes\Domain\ValueObject\Web;

use PhpSpec\ObjectBehavior;
use RayRutjes\Domain\DomainException\AssertionFailedException;
use RayRutjes\Domain\ValueObject;
use RayRutjes\Domain\ValueObject\String\StringObject;
use RayRutjes\Domain\ValueObject\Web\EmailAddress;

class EmailAddressSpec extends ObjectBehavior
{
    public function let()
    {
        $email = StringObject::fromNativeString('g.mansoif@example.com');
        $this->beConstructedWith($email);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('RayRutjes\Domain\ValueObject\Web\EmailAddress');
        $this->shouldHaveType('RayRutjes\Domain\ValueObject');
    }

    public function it_should_not_accept_misformatted_email_addresses()
    {
        $email = StringObject::fromNativeString('g.mansoif[@]example.com');
        $this->shouldThrow(new AssertionFailedException('Misformatted email address.'))->during('__construct', [$email]);
    }

    public function it_can_be_compared_with_another_email_address(ValueObject $valueObject)
    {
        $same = EmailAddress::fromNativeString('g.mansoif@example.com');
        $this->sameValueAs($same)->shouldReturn(true);

        $other = EmailAddress::fromNativeString('other@example.com');
        $this->sameValueAs($other)->shouldReturn(false);

        $this->sameValueAs($valueObject)->shouldReturn(false);
    }

    public function it_can_be_translated_to_a_native_string()
    {
        $this->toNativeString()->shouldReturn('g.mansoif@example.com');
        $this->__toString()->shouldReturn('g.mansoif@example.com');
    }
}
