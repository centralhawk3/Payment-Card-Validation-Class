<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaymentCardValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PaymentCardValidator');
    }

    function it_returns_false_if_a_card_fails_the_luhn_algorithm()
    {
        $this->luhn('4242424242424242')->shouldReturn(false);
    }

    function it_returns_true_if_a_card_passes_the_luhn_algorithm()
    {
        $this->luhn('49927398716')->shouldReturn(true);
    }
}
