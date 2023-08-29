<?php

namespace App\Models\Client\CreditCard;


use App\Models\CustomModel;
use App\Models\Enum\CreditCardPaymentEnumType;
use App\Models\Enum\StatusEnumType;
use Database\Factories\CardTransactionFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client\CreditCard\CardTransaction
 *
 * @property int $id
 * @property int $credit_card_id
 * @property int $client_id
 * @property string $sum
 * @property CreditCardPaymentEnumType|null $type
 * @property StatusEnumType $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read CreditCard $creditCard
 * @method static Builder|CardTransaction newModelQuery()
 * @method static Builder|CardTransaction newQuery()
 * @method static Builder|CardTransaction query()
 * @method static Builder|CardTransaction whereClientId($value)
 * @method static Builder|CardTransaction whereCreatedAt($value)
 * @method static Builder|CardTransaction whereCreditCardId($value)
 * @method static Builder|CardTransaction whereId($value)
 * @method static Builder|CardTransaction whereStatus($value)
 * @method static Builder|CardTransaction whereSum($value)
 * @method static Builder|CardTransaction whereType($value)
 * @method static Builder|CardTransaction whereUpdatedAt($value)
 * @mixin Eloquent
 */
class CardTransaction extends CustomModel
{
    protected $casts = [
        'status' => StatusEnumType::class,
        'type' => CreditCardPaymentEnumType::class,
    ];

    public static function scopeFindById(\Illuminate\Contracts\Database\Query\Builder $query, int $id)
    {
        return $query->where('id', $id);
    }

    protected static function newFactory(): CardTransactionFactory
    {
        return new CardTransactionFactory();
    }

    public function creditCard(): BelongsTo
    {
        return $this->belongsTo(CreditCard::class);
    }
}
