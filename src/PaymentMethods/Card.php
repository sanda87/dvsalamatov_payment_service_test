<?php

declare(strict_types=1);

namespace App\PaymentMethods;

use App\PaymentMethods\Enum\PaymentNameEnum;
use DateTime;

class Card extends AbstractPaymentMethod
{
    private string $pan;
    private DateTime $expiryDate;
    private int $cvc;

    public function __construct(string $pan, DateTime $expiryDate, int $cvc)
    {
        $this->pan = $pan;
        $this->expiryDate = $expiryDate;
        $this->cvc = $cvc;
    }

    public function getPan() : string
    {
        return $this->pan;
    }

    public function getExpiryDate() : DateTime
    {
        return $this->expiryDate;
    }

    public function getCvc() : int
    {
        return $this->cvc;
    }

    public function getPaymentName() : string
    {
        return PaymentNameEnum::CARD;
    }
}
