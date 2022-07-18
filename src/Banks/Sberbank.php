<?php

declare(strict_types=1);

namespace App\Banks;

use App\Banks\Responses\ProcessedPayment;
use App\PaymentMethods\Card;
use Money\Money;

class Sberbank extends AbstractBank
{

    public function processCardPayment(Money $amount, Card $card): ProcessedPayment
    {
        return new ProcessedPayment(ProcessedPayment::STATUS_FAILED);
    }
}
