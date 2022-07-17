<?php
declare(strict_types = 1);

namespace App\Fee;

use Money\Money;

class FeeCalculatorCalculator implements FeeCalculatorInterface
{
    protected Money $amount;
    protected string $paymentMethod;

    public function __construct(Money $amount, string $paymentMethod)
    {
        $this->amount = $amount;
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Все настройки по комсе хранятся в базе, поэтому один класс на все банки
     * Можно сделать отдельные классы по каждому типу комсы: по банку, по типу платежа и дефолтная комса
     */

    public function calculateCommission(): Money
    {
        return Money::RUB(100);
    }
}
