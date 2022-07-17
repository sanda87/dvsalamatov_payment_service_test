<?php
declare(strict_types = 1);

namespace App\Services\Payments\Contracts;

use App\PaymentMethods\Card;
use App\Payments\Contracts\PaymentInterface;

interface CardPaymentInterface extends PaymentInterface
{
    public function getCard(): Card;
}
