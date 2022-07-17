<?php

declare(strict_types=1);

namespace App\PaymentMethods\Contracts;

interface GetPaymentNameInterface
{
    public function getPaymentName() : string;
}
