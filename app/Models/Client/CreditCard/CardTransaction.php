<?php

namespace App\Models\Client\CreditCard;


use App\Models\CustomModel;
use App\Models\Enum\CreditCardPaymentEnumType;
use App\Models\Enum\StatusEnumType;
use Database\Factories\CardTransactionFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Client\CreditCard\CardTransaction
 *
 * @property int $id
 * @property int $credit_card_id
 * @property int $client_id
 * @property string $sum
 * @property CreditCardPaymentEnumType|null $type
 * @property StatusEnumType $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client\CreditCard\CreditCard $creditCard
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction whereCreditCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
