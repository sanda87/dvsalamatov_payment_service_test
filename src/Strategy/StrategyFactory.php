<?php

declare(strict_types=1);

namespace App\Strategy;

use App\PaymentMethods\Enum\PaymentNameEnum;
use App\Services\Payments\Contracts\ChargePaymentServiceInterface;
use App\Services\Payments\Contracts\CreatePaymentServiceInterface;
use App\Strategy\Contracts\StrategyInterface;
use Exception;

class StrategyFactory
{
    private CreatePaymentServiceInterface $createPaymentService;
    private ChargePaymentServiceInterface $chargePaymentService;

    public function __construct(
        CreatePaymentServiceInterface $createPaymentService,
        ChargePaymentServiceInterface $chargePaymentService
    ) {
        $this->createPaymentService = $createPaymentService;
        $this->chargePaymentService = $chargePaymentService;
    }

    /**
     * @param string $paymentFlowName
     * @return StrategyInterface
     * @throws Exception
     */
    public function create(string $paymentFlowName) : StrategyInterface
    {
        switch ($paymentFlowName) {
            case PaymentNameEnum::CARD:
                $strategy = new CardStrategy($this->createPaymentService, $this->chargePaymentService);
                break;
            case PaymentNameEnum::QIWI:
                $strategy = new QiwiStrategy($this->createPaymentService, $this->chargePaymentService);
                break;
            default:
                //TODO выкидывать специальный exception место общего
                throw new Exception('Wrong flow name');
        }

        return $strategy;
    }
}
