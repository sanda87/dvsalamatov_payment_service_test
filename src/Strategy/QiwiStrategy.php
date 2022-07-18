<?php

declare(strict_types=1);

namespace App\Strategy;

use App\Banks\Contracts\BankInterface;
use App\Banks\Responses\ProcessedPayment;
use App\Fee\FeeCalculatorInterface;
use App\PaymentMethods\CardFactory;
use App\PaymentMethods\PaymentMethodInterface;
use App\PaymentMethods\Qiwi;
use App\Payments\Contracts\PaymentInterface;
use App\Payments\QiwiPayment;
use App\Strategy\Contracts\StrategyInterface;
use LogicException;
use Money\Money;

class QiwiStrategy implements StrategyInterface
{
    public function createPaymentMethod(array $params): PaymentMethodInterface
    {
        return CardFactory::createQiwi($params);
    }

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
    ): PaymentInterface
    {
        $this->validatePaymentMethod($paymentMethod);
        /**
         * @var Qiwi $paymentMethod
         */
        return new QiwiPayment($amount, $feeCalculator->calculateCommission(), $paymentMethod);
    }

    public function processPayment(PaymentInterface $payment, BankInterface $bank): ProcessedPayment
    {
        $qiwi = $payment->getPaymentMethod();
        $this->validatePaymentMethod($qiwi);
        /**
         * @var Qiwi $qiwi
         */
        return $bank->processQiwiPayment($payment->getAmount(), $qiwi);
    }

    private function validatePaymentMethod(PaymentMethodInterface $paymentMethod)
    {
        if (!($paymentMethod instanceof Qiwi)) {
            throw new LogicException('PaymentMethod is not a Qiwi instance');
        }
    }
}
