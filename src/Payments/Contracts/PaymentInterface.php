<?php

declare(strict_types=1);

namespace App\Payments\Contracts;

use App\PaymentMethods\PaymentMethodInterface;
use Money\Money;

interface PaymentInterface
{
    public function getAmount() : Money;

    public function getPaymentMethod(): PaymentMethodInterface;
}
