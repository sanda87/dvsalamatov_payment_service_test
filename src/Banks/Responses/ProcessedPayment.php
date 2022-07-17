<?php

declare(strict_types=1);

namespace App\Banks\Responses;

class ProcessedPayment
{
    public const STATUS_FAILED = 1;
    public const STATUS_COMPLETED = 2;

    private int $status;

    public function __construct(int $status)
    {
        $this->status = $status;
    }

    public function isFailed() : bool
    {
        return $this->status === self::STATUS_FAILED;
    }

    public function isCompleted() : bool
    {
        return $this->status === self::STATUS_COMPLETED;
    }
}
