<?php

declare(strict_types=1);

namespace App\PaymentMethods;

use App\PaymentMethods\Enum\PaymentNameEnum;

class Qiwi extends AbstractPaymentMethod
{
    private string $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public function getPhone() : string
    {
        return $this->phone;
    }

    public function getPaymentName() : string
    {
        return PaymentNameEnum::QIWI;
    }
}
