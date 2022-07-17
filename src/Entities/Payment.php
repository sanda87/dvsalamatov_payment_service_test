<?php

declare(strict_types=1);

namespace App\Entities;

use DateTime;
use Money\Money;

class Payment
{
    protected Money $amount;
    protected Money $commission;
    protected DateTime $createdAt;

    public function __construct(Money $amount, Money $commission)
    {
        $this->amount = $amount;
        $this->commission = $commission;
        $this->createdAt = new DateTime();
    }

    public function getAmount() : Money
    {
        return $this->amount;
    }

    public function getCommission() : Money
    {
        return $this->commission;
    }

    public function getCreatedAt() : DateTime
    {
        return $this->createdAt;
    }

    //TODO добавить поле amount_without_fee
    public function getNetAmount() : Money
    {
        return $this->amount->subtract($this->commission);
    }
}
