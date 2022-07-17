<?php

declare(strict_types=1);

namespace App\Payments;

use App\PaymentMethods\Qiwi;
use App\Payments\Contracts\QiwiPaymentInterface;
use Money\Money;

class QiwiPayment extends AbstractPayment implements QiwiPaymentInterface
{
    private Qiwi $qiwi;

    public function __construct(Money $amount, Money $commission, Qiwi $qiwi)
    {
        parent::__construct($amount, $commission);

        $this->qiwi = $qiwi;
    }

    public function getQiwi() : Qiwi
    {
        return $this->qiwi;
    }
}
