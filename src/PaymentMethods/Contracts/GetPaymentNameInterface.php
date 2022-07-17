<?php

namespace App\PaymentMethods\Contracts;

interface GetPaymentNameInterface
{
    public function getPaymentName(): string;
}
