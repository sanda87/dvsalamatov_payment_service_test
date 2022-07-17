<?php

namespace App\Services\Payments\Commands;

use App\Fee\FeeCalculatorInterface;
use Money\Money;

class CreatePaymentCommand
{
    private Money $amount;
    private FeeCalculatorInterface $feeCalculator;
//    private string $paymentName;
//    private mixed $paymentMethod;

    public function __construct(
        Money $amount,
        FeeCalculatorInterface $feeCalculator
    ) {
        $this->amount = $amount;
        $this->feeCalculator = $feeCalculator;
//        $this->paymentName = $paymentName;
//        $this->paymentMethod = $paymentMethod;
    }

    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function getFeeCalculator(): FeeCalculatorInterface
    {
        return $this->feeCalculator;
    }

//    public function getPaymentName(): string
//    {
//        return $this->paymentName;
//    }

//    public function getPaymentMethod(): mixed
//    {
//        return $this->paymentMethod;
//    }


}
