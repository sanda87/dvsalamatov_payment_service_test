<?php

declare(strict_types=1);

namespace App\Banks;

use App\Banks\Contracts\BankInterface;
use App\Banks\Enum\BanksNames;
use Exception;

class BankFactory
{
    /**
     * @throws Exception
     */
    public static function create(string $acquirerName) : BankInterface
    {
        switch ($acquirerName) {
            case BanksNames::SBERBANK:
                return new Sberbank();
            case BanksNames::TINKOFF:
                return new Tinkoff();
            default:
                //TODO Выкидывать исключение со специальным именем вместо общего Exception
                throw new Exception('Bank name is wrong');
        }
    }
}
