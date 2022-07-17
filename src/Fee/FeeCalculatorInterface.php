<?php

declare(strict_types=1);

namespace App\Fee;

use Money\Money;

interface FeeCalculatorInterface
{
    public function calculateCommission() : Money;
}
