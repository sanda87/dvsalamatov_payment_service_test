<?php
declare(strict_types = 1);

namespace App\Payments\Contracts;

use Money\Money;

interface PaymentInterface
{
    public function getAmount(): Money;
}
