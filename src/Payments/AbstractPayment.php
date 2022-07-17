<?php
declare(strict_types = 1);

namespace App\Payments;

use App\Entities\Payment;
use Money\Money;

abstract class AbstractPayment
{
    protected Payment $payment;

    public function __construct(Money $amount, Money $commission)
    {
        $this->payment = new Payment($amount, $commission);
    }

    public function getAmount(): Money
    {
        return $this->payment->getAmount();
    }
}
