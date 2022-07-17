<?php

declare(strict_types=1);

namespace App\Services\Payments\Contracts;

use App\Banks\Contracts\BankInterface;
use App\Banks\Responses\ProcessedPayment;
use App\Payments\Contracts\CardPaymentInterface;
use App\Payments\Contracts\QiwiPaymentInterface;

interface ChargePaymentServiceInterface
{
    public function handleCardPayment(CardPaymentInterface $payment, BankInterface $bank) : ProcessedPayment;

    public function handleQiwiPayment(QiwiPaymentInterface $payment, BankInterface $bank) : ProcessedPayment;
}
