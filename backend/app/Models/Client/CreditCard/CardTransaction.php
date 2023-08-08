<?php

namespace App\Models\Client\CreditCard;


use App\Models\CustomModel;
use Database\Factories\CardTransactionFactory;

class CardTransaction extends CustomModel
{
    protected static function newFactory(): CardTransactionFactory
    {
        return new CardTransactionFactory();
    }
}
