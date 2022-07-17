<?php

declare(strict_types=1);

namespace App\Services\Payments\Commands;

use App\Fee\FeeCalculatorInterface;
use Money\Money;

class CreatePaymentCommand
{
    private Money $amount;
    private FeeCalculatorInterface $feeCalculator;

    public function __construct(
        Money $amount,
        FeeCalculatorInterface $feeCalculator
    ) {
        $this->amount = $amount;
        $this->feeCalculator = $feeCalculator;
    }

    public function getAmount() : Money
    {
        return $this->amount;
    }

    public function getFeeCalculator() : FeeCalculatorInterface
    {
        return $this->feeCalculator;
    }
}
