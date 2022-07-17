<?php

declare(strict_types=1);

namespace App\Strategy;

use App\Banks\BankFactory;
use App\Banks\Contracts\BankInterface;
use App\Fee\FeeCalculatorCalculator;
use App\Fee\FeeCalculatorInterface;
use App\Services\Payments\Contracts\ChargePaymentServiceInterface;
use App\Services\Payments\Contracts\CreatePaymentServiceInterface;
use App\Strategy\Contracts\StrategyInterface;

abstract class AbstractStrategy implements StrategyInterface
{
    protected Context $context;
    protected BankInterface $bank;
    protected FeeCalculatorInterface $feeCalculator;
    protected CreatePaymentServiceInterface $createPaymentService;
    protected ChargePaymentServiceInterface $chargePaymentService;

    public function __construct(
        CreatePaymentServiceInterface $createPaymentService,
        ChargePaymentServiceInterface $chargePaymentService
    ) {
        $this->createPaymentService = $createPaymentService;
        $this->chargePaymentService = $chargePaymentService;
    }

    public function setContext(Context $context) : void
    {
        $this->context = $context;
    }

    public function createBank() : void
    {
        $this->bank = BankFactory::create($this->context->getBankName());
    }

    protected function createFeeCalculator() : void
    {
        $this->feeCalculator = new FeeCalculatorCalculator(
            $this->context->getAmount(),
            $this->context->getPaymentFlow()
        );
    }
}
