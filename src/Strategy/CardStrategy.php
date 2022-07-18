<?php

declare(strict_types=1);

namespace App\Strategy;

use App\Banks\Contracts\BankInterface;
use App\Banks\Responses\ProcessedPayment;
use App\Fee\FeeCalculatorInterface;
use App\PaymentMethods\Card;
use App\PaymentMethods\CardFactory;
use App\PaymentMethods\PaymentMethodInterface;
use App\Payments\CardPayment;
use App\Payments\Contracts\PaymentInterface;
use App\Strategy\Contracts\StrategyInterface;
use LogicException;
use Money\Money;

class CardStrategy implements StrategyInterface
{

    public function createPaymentMethod(array $params): PaymentMethodInterface
    {
        return CardFactory::createCard($params);
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
         * @var Card $paymentMethod
         */
        return new CardPayment($amount, $feeCalculator->calculateCommission(), $paymentMethod);
    }

    public function processPayment(PaymentInterface $payment, BankInterface $bank): ProcessedPayment
    {
        $card = $payment->getPaymentMethod();
        $this->validatePaymentMethod($card);
        /**
         * @var Card $card
         */
        return $bank->processCardPayment($payment->getAmount(), $card);
    }

    private function validatePaymentMethod(PaymentMethodInterface $paymentMethod)
    {
        if (!($paymentMethod instanceof Card)) {
            throw new LogicException('PaymentMethod is not a Card instance');
        }
    }
}
