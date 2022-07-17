<?php
declare(strict_types = 1);

namespace App\Payments\Contracts;

use App\PaymentMethods\Card;

interface CardPaymentInterface extends PaymentInterface
{
    public function getCard(): Card;
}
