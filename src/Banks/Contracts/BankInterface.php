<?php
declare(strict_types=1);

namespace App\Banks\Contracts;

use App\Banks\Responses\ProcessedPayment;
use App\PaymentMethods\Card;
use App\PaymentMethods\Qiwi;
use Money\Money;

interface BankInterface
{
    public function processCardPayment(Money $amount, Card $card): ProcessedPayment;

    public function processQiwiPayment(Money $amount, Qiwi $qiwi): ProcessedPayment;
}
