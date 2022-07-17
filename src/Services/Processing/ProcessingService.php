<?php

namespace App\Services\Processing;

use App\Banks\Responses\ProcessedPayment;
use App\Services\Payments\Contracts\ChargePaymentServiceInterface;
use App\Services\Payments\Contracts\CreatePaymentServiceInterface;
use App\Services\Processing\Contracts\ProcessingServiceInterface;
use App\Strategy\Context;
use App\Strategy\StrategyFactory;

class ProcessingService implements ProcessingServiceInterface
{
    private StrategyFactory $strategyFactory;

    public function __construct(
        CreatePaymentServiceInterface $createPaymentService,
        ChargePaymentServiceInterface $chargePaymentService
    ) {
        $this->strategyFactory = new StrategyFactory($createPaymentService, $chargePaymentService);
    }

    public function handle(Context $context): ProcessedPayment
    {
        $strategy = $this->strategyFactory->create($context->getPaymentFlow());
        $strategy->setContext($context);
        $strategy->createBank();
        $strategy->createPaymentMethod();
        $strategy->createPayment();

        return $strategy->processPayment();
    }
}
