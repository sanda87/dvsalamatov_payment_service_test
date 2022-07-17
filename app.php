<?php

declare(strict_types=1);

use App\Banks\Enum\BanksNames;
use App\PaymentMethods\Enum\PaymentNameEnum;
use App\Services\Payments\ChargePaymentService;
use App\Services\Payments\CreatePaymentService;
use App\Services\Processing\ProcessingService;
use App\Strategy\Context;

require_once './vendor/autoload.php';

$clientBankName = BanksNames::SBERBANK;
$clientAmount = 100;
$clientCurrency = 'EUR';

//Example for Qiwi
$clientPaymentFlow = PaymentNameEnum::QIWI;
$params = ['phone' => '+79059808010'];
$context = new Context($clientAmount, $clientCurrency, $clientBankName, $clientPaymentFlow, $params);
$processingService = new ProcessingService(new CreatePaymentService(), new ChargePaymentService());
$response = $processingService->handle($context);

//Example for Card
//$clientPaymentFlow = PaymentNameEnum::CARD;
//$params = [
//    'pan' => '4242424242424242',
//    'date' => new \DateTime('2021-10-15'),
//    'cvc' => 123
//];
//$context = new Context($clientAmount, $clientCurrency, $clientBankName, $clientPaymentFlow, $params);
//$processingService = new ProcessingService(new CreatePaymentService(), new ChargePaymentService());
//$response = $processingService->handle($context);

if ($response->isCompleted()) {
    echo 'Thank you! Payment completed';
} elseif ($response->isFailed()) {
    echo 'Something went wrong! Try another card';
}
echo PHP_EOL;
