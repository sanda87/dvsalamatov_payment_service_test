<?php
declare(strict_types = 1);

namespace App\Strategy;

use Money\Money;

class Context
{
    private float $amount;
    private string $currency;
    private string $bankName;
    private string $paymentFlow;
    private array $paymentMethodParams;

    public function __construct(
        float $amount,
        string $currency,
        string $bankName,
        string $paymentFlow,
        array $paymentMethodParams
    ) {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->bankName = $bankName;
        $this->paymentFlow = $paymentFlow;
        $this->paymentMethodParams = $paymentMethodParams;
    }

    public function getAmount(): Money
    {
        return Money::{$this->currency}($this->amount);
    }

    public function getBankName(): string
    {
        return $this->bankName;
    }

    public function getPaymentFlow(): string
    {
        return $this->paymentFlow;
    }

    public function getPaymentMethodParams(): array
    {
        return $this->paymentMethodParams;
    }
}
