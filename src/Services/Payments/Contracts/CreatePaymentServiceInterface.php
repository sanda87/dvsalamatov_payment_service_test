<?php

namespace App\Services\Payments\Contracts;

use App\PaymentMethods\Card;
use App\PaymentMethods\Qiwi;
use App\Payments\Contracts\CardPaymentInterface;
use App\Payments\Contracts\QiwiPaymentInterface;
use App\Services\Payments\Commands\CreatePaymentCommand;

interface CreatePaymentServiceInterface
{
    public function handleCard(CreatePaymentCommand $command, Card $card): CardPaymentInterface;

    public function handleQiwi(CreatePaymentCommand $command, Qiwi $qiwi): QiwiPaymentInterface;
}
