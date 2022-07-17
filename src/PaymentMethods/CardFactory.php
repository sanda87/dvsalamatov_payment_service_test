<?php
declare(strict_types = 1);

namespace App\PaymentMethods;

class CardFactory
{
    public static function createCard(array $params): Card
    {
        return new Card(
            $params['pan'],
            $params['date'],
            $params['cvc'],
        );
    }

    public static function createQiwi(array $params): Qiwi
    {
        return new Qiwi($params['phone']);
    }
}
