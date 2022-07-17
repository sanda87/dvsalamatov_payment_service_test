<?php

namespace App\Services\Payments;

use App\Banks\Contracts\BankInterface;
use App\Banks\Responses\ProcessedPayment;
use App\Payments\Contracts\QiwiPaymentInterface;
use App\Services\Payments\Contracts\CardPaymentInterface;
use App\Services\Payments\Contracts\ChargePaymentServiceInterface;

class ChargePaymentService implements ChargePaymentServiceInterface
{
    public function handleCardPayment(CardPaymentInterface $payment, BankInterface $bank): ProcessedPayment
    {
        return $bank->processCardPayment($payment->getAmount(), $payment->getCard());
    }

    public function handleQiwiPayment(QiwiPaymentInterface $payment, BankInterface $bank): ProcessedPayment
    {
        return $bank->processQiwiPayment($payment->getAmount(), $payment->getQiwi());
    }
}
