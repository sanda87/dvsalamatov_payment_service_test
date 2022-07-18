<?php

declare(strict_types=1);

namespace App\Payments;

use App\PaymentMethods\PaymentMethodInterface;
use App\PaymentMethods\Qiwi;
use App\Payments\Contracts\PaymentInterface;
use Money\Money;

class QiwiPayment extends AbstractPayment implements PaymentInterface
{
    private Qiwi $qiwi;

    public function __construct(Money $amount, Money $commission, Qiwi $qiwi)
    {
        parent::__construct($amount, $commission);

        $this->qiwi = $qiwi;
    }

    public function getPaymentMethod(): PaymentMethodInterface
    {
        return $this->qiwi;
    }
}
