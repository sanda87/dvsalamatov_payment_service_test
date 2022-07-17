<?php

declare(strict_types=1);

namespace App\PaymentMethods;

use App\PaymentMethods\Contracts\GetPaymentNameInterface;

abstract class AbstractPaymentMethod implements GetPaymentNameInterface
{
}
