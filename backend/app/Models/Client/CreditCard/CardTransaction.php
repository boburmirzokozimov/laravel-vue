<?php

namespace App\Models\Client\CreditCard;


use App\Models\CustomModel;
use App\Models\Enum\CreditCardPaymentEnumType;
use App\Models\Enum\StatusEnumType;
use Database\Factories\CardTransactionFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function creditCard(): BelongsTo
    {
        return $this->belongsTo(CreditCard::class);
    }
}
