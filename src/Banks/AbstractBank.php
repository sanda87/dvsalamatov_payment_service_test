<?php

declare(strict_types=1);

namespace App\Banks;

use App\Banks\Contracts\BankInterface;
use App\Banks\Responses\ProcessedPayment;
use App\PaymentMethods\Card;
use App\PaymentMethods\Qiwi;
use Money\Money;

abstract class AbstractBank implements BankInterface
{
    public function processCardPayment(Money $amount, Card $card) : ProcessedPayment
    {
        return new ProcessedPayment(ProcessedPayment::STATUS_COMPLETED);
    }

    public function processQiwiPayment(Money $amount, Qiwi $qiwi) : ProcessedPayment
    {
        return new ProcessedPayment(ProcessedPayment::STATUS_COMPLETED);
    }
}
