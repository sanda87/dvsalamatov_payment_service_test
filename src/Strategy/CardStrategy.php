<?php
declare(strict_types = 1);

namespace App\Services\Strategy;

use App\Banks\Responses\ProcessedPayment;
use App\PaymentMethods\Card;
use App\PaymentMethods\CardFactory;
use App\Services\Payments\Commands\CreatePaymentCommand;
use App\Services\Payments\Contracts\CardPaymentInterface;
use App\Strategy\AbstractStrategy;
use App\Strategy\Context;
use App\Strategy\Contracts\CardStrategyInterface;

class CardStrategy extends AbstractStrategy implements CardStrategyInterface
{
    protected Card $card;
    protected CardPaymentInterface $payment;

    public function createPaymentMethod(): void
    {
        $this->card = CardFactory::createCard($this->context->getPaymentMethodParams());
    }

    public function createPayment(): void
    {
        $this->createFeeCalculator();

        $this->payment = $this->createPaymentService->handleCard(
            new CreatePaymentCommand($this->context->getAmount(), $this->feeCalculator),
            $this->card
        );
    }

    public function processPayment(): ProcessedPayment
    {
        return $this->chargePaymentService->handleCardPayment($this->payment, $this->bank);
    }

    public function setContext(Context $context): void
    {
        // TODO: Implement setContext() method.
    }

    public function createBank(): void
    {
        // TODO: Implement createBank() method.
    }
}
