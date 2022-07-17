<?php
declare(strict_types = 1);

namespace App\Strategy\Contracts;

use App\Banks\Responses\ProcessedPayment;
use App\Strategy\Context;

interface StrategyInterface
{
    public function setContext(Context $context): void;

    public function createBank(): void;

    public function createPaymentMethod(): void;

    public function createPayment(): void;

    public function processPayment(): ProcessedPayment;
}
