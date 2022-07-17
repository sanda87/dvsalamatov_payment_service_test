<?php
declare(strict_types = 1);

namespace App\Strategy;

use App\Banks\Responses\ProcessedPayment;
use App\PaymentMethods\CardFactory;
use App\PaymentMethods\Qiwi;
use App\Payments\Contracts\QiwiPaymentInterface;
use App\Services\Payments\Commands\CreatePaymentCommand;
use App\Strategy\Contracts\CardStrategyInterface;

class QiwiStrategy extends AbstractStrategy implements CardStrategyInterface
{
    protected Qiwi $qiwi;
    protected QiwiPaymentInterface $payment;

    public function createPaymentMethod(): void
    {
        $this->qiwi = CardFactory::createQiwi($this->context->getPaymentMethodParams());
    }

    public function createPayment(): void
    {
        $this->createFeeCalculator();

        $this->payment = $this->createPaymentService->handleQiwi(
            new CreatePaymentCommand($this->context->getAmount(), $this->feeCalculator),
            $this->qiwi
        );
    }

    public function processPayment(): ProcessedPayment
    {
        return $this->chargePaymentService->handleQiwiPayment($this->payment, $this->bank);
    }
}
