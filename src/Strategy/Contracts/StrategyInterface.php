<?php

declare(strict_types=1);

namespace App\Strategy\Contracts;

use App\Banks\Contracts\BankInterface;
use App\Banks\Responses\ProcessedPayment;
use App\Fee\FeeCalculatorInterface;
use App\PaymentMethods\PaymentMethodInterface;
use App\Payments\Contracts\PaymentInterface;
use Money\Money;

interface StrategyInterface
{
    public function createPaymentMethod(array $params): PaymentMethodInterface;

    /**
     * @param Money $amount
     * @param FeeCalculatorInterface $feeCalculator
     * @param PaymentMethodInterface $paymentMethod
     * @return PaymentInterface
     */
    public function createPayment(
        Money $amount,
        FeeCalculatorInterface $feeCalculator,
        PaymentMethodInterface $paymentMethod
    ): PaymentInterface;

    public function processPayment(PaymentInterface $payment, BankInterface $bank): ProcessedPayment;
}
