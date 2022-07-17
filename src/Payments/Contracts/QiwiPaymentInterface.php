<?php

declare(strict_types=1);

namespace App\Payments\Contracts;

use App\PaymentMethods\Qiwi;

interface QiwiPaymentInterface extends PaymentInterface
{
    public function getQiwi() : Qiwi;
}
