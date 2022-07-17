<?php

namespace App\Services\Processing\Contracts;

use App\Banks\Responses\ProcessedPayment;
use App\Strategy\Context;

interface ProcessingServiceInterface
{
    public function handle(Context $context): ProcessedPayment;
}
