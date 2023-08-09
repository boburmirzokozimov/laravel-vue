<?php

namespace App\Models\Client\CreditCard;


use App\Models\CustomModel;
use App\Models\Enum\CreditCardPaymentEnumType;
use App\Models\Enum\StatusEnumType;
use Database\Factories\CardTransactionFactory;

class CardTransaction extends CustomModel
{
    protected $casts = [
        'status' => StatusEnumType::class,
        'type' => CreditCardPaymentEnumType::class,
    ];

    protected static function newFactory(): CardTransactionFactory
    {
        return new CardTransactionFactory();
    }
}
