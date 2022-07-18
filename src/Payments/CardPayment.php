<?php

declare(strict_types=1);

namespace App\Payments;

use App\PaymentMethods\Card;
use App\PaymentMethods\PaymentMethodInterface;
use App\Payments\Contracts\PaymentInterface;
use Money\Money;

class CardPayment extends AbstractPayment implements PaymentInterface
{
    private Card $card;

    public function __construct(Money $amount, Money $commission, Card $card)
    {
        parent::__construct($amount, $commission);

        $this->card = $card;
    }

    public function getPaymentMethod(): PaymentMethodInterface
    {
        return $this->card;
    }
}
