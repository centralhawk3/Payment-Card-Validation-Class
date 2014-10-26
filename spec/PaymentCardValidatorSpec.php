<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaymentCardValidatorSpec extends ObjectBehavior
{

    function it_returns_false_if_a_card_fails_the_luhn_algorithm()
    {
        $this->beConstructedWith('4242424242424242');

        $this->isValid()->shouldReturn(false);
    }

    function it_returns_true_if_a_card_passes_the_luhn_algorithm()
    {
        $this->beConstructedWith('12345678');

        $this->isValid()->shouldReturn(true);
    }
}
