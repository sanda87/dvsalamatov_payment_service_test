<?php

declare(strict_types=1);

use App\Banks\BankFactory;
use App\Banks\Enum\BanksNames;
use App\Fee\FeeCalculatorCalculator;
use App\PaymentMethods\Enum\PaymentNameEnum;
use App\Strategy\CardStrategy;
use App\Strategy\QiwiStrategy;
use Money\Money;

require_once './vendor/autoload.php';

//Example for Qiwi
$bank = BankFactory::create(BanksNames::SBERBANK);
$amount = Money::EUR(100);

//$feeCalculator = new FeeCalculatorCalculator($amount, PaymentNameEnum::QIWI);
//
//$strategy = new QiwiStrategy();
//$paymentMethod = $strategy->createPaymentMethod(['phone' => '+79059808010']);
//$payment = $strategy->createPayment($amount, $feeCalculator, $paymentMethod);
//$response = $strategy->processPayment($payment, $bank);

//Example for Card
$feeCalculator = new FeeCalculatorCalculator($amount, PaymentNameEnum::CARD);

$strategy = new CardStrategy();
$paymentMethod = $strategy->createPaymentMethod([
    'pan' => '4242424242424242',
    'date' => new \DateTime('2021-10-15'),
    'cvc' => 123
]);
$payment = $strategy->createPayment($amount, $feeCalculator, $paymentMethod);
$response = $strategy->processPayment($payment, $bank);

if ($response->isCompleted()) {
    echo 'Thank you! Payment completed';
} elseif ($response->isFailed()) {
    echo 'Something went wrong! Try another card';
}
echo PHP_EOL;
