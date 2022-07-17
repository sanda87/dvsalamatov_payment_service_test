<?php

declare(strict_types=1);

namespace App\Payments;

use App\PaymentMethods\Card;
use App\Payments\Contracts\CardPaymentInterface;
use Money\Money;

class CardPayment extends AbstractPayment implements CardPaymentInterface
{
    private Card $card;

    public function __construct(Money $amount, Money $commission, Card $card)
    {
        parent::__construct($amount, $commission);

        $this->card = $card;
    }

    public function getCard() : Card
    {
        return $this->card;
    }
}
