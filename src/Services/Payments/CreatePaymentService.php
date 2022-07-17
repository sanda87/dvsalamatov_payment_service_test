<?php

namespace App\Services\Payments;

use App\PaymentMethods\Card;
use App\PaymentMethods\Qiwi;
use App\Payments\Contracts\QiwiPaymentInterface;
use App\Payments\QiwiPayment;
use App\Services\Payments\Commands\CreatePaymentCommand;
use App\Services\Payments\Contracts\CardPaymentInterface;
use App\Services\Payments\Contracts\CreatePaymentServiceInterface;

class CreatePaymentService implements CreatePaymentServiceInterface
{
    public function handleCard(CreatePaymentCommand $command, Card $card): CardPaymentInterface
    {
        $commission = $command->getFeeCalculator()->calculateCommission();

        return new CardPayment($command->getAmount(), $commission, $card);
    }

    public function handleQiwi(CreatePaymentCommand $command, Qiwi $qiwi): QiwiPaymentInterface
    {
        $commission = $command->getFeeCalculator()->calculateCommission();

        return new QiwiPayment($command->getAmount(), $commission, $qiwi);
    }
}
