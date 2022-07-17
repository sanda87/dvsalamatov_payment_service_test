<?php

use App\Fee\FeeCalculatorCalculator;
use App\PaymentMethods\Card;
use App\PaymentMethods\Qiwi;
use App\Services\Payments\ChargePaymentService;
use App\Services\Payments\Commands\CreatePaymentCommand;
use App\Services\Payments\CreatePaymentService;
use App\Services\Processing\ProcessingService;
use App\Services\Strategy\CardStrategy;
use App\Strategy\Context;
use Money\Money;

require_once './vendor/autoload.php';

//$createPaymentService = new CreatePaymentService();

$clientBankName = 'sberbank';
$clientPaymentFlow = 'qiwi';
$clientAmount = 100;
$clientCurrency = 'EUR';

//****************

$params = [
    'pan' => '4242424242424242',
    'date' => new \DateTime('2021-10-15'),
    'cvc' => 123
];
$context = new Context($clientAmount, $clientCurrency, $clientBankName, $clientPaymentFlow, $params);
$processingService = new ProcessingService(new CreatePaymentService(), new ChargePaymentService());
$response = $processingService->handle($context);

//$params = ['phone' => '+79059808010'];
//$context = new Context($clientAmount, $clientCurrency, $clientBankName, $clientPaymentFlow, $params);
//$processingService = new ProcessingService(new CreatePaymentService(), new ChargePaymentService());
//$response = $processingService->handle($context);

//$cardStrategy = new CardStrategy(new CreatePaymentService(), new ChargePaymentService());
//$cardStrategy->createPaymentMethod();
//$cardStrategy->createPayment();
//$cardStrategy->processPayment();
//
//$amount = Money::$clientCurrency($clientAmount);
//
//$bank = \App\Banks\BankFactory::create($clientBankName);
//
//$paymentMethod = new Qiwi($clientPhoneNumber);
//
//$feeCalculator = new FeeCalculatorCalculator($amount, $paymentMethod->getPaymentName());
//
//$payment = $createPaymentService->handleCard(new CreatePaymentCommand($amount, $feeCalculator), $paymentMethod);
//$payment = $createPaymentService->handleQiwi(new CreatePaymentCommand($amount, $feeCalculator), $paymentMethod);
//
////TODO Настройки банк -> платежная система хранить в базе данных
//
//$chargePaymentService = new ChargePaymentService();
//$response = $chargePaymentService->handleCardPayment($payment, $bank);
//$response = $chargePaymentService->handleQiwiPayment($payment, $bank);


if ($response->isCompleted()) {
    echo 'Thank you! Payment completed';
} elseif ($response->isFailed()) {
    echo 'Something went wrong! Try another card';
}
echo PHP_EOL;
