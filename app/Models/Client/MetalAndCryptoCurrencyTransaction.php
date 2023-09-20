<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use App\Models\Enum\TransactionTypeEnum;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client\MetalAndCryptoCurrencyTransaction
 *
 * @property int $id
 * @property TransactionTypeEnum|null $type
 * @property string|null $sort
 * @property int|null $sum
 * @property bool $withdraw
 * @property int $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float|null $quantity
 * @property string|null $status
 * @property int|null $balance_request_id
 * @property-read BalanceRequest|null $balanceRequest
 * @property-read Client $client
 * @method static Builder|MetalAndCryptoCurrencyTransaction newModelQuery()
 * @method static Builder|MetalAndCryptoCurrencyTransaction newQuery()
 * @method static Builder|MetalAndCryptoCurrencyTransaction query()
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereBalanceRequestId($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereClientId($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereCreatedAt($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereId($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereQuantity($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereSort($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereStatus($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereSum($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereType($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereUpdatedAt($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction whereWithdraw($value)
 * @method static Builder|MetalAndCryptoCurrencyTransaction metalTransactions()
 * @method static Builder|MetalAndCryptoCurrencyTransaction cryptoTransactions()
 * @mixin Eloquent
 */
class MetalAndCryptoCurrencyTransaction extends CustomModel
{
    protected $casts = [
        'type' => TransactionTypeEnum::class,
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function balanceRequest(): HasOne
    {
        return $this->hasOne(BalanceRequest::class);
    }

    public function scopeMetalTransactions(Builder $builder, Client $client): Builder
    {
        return $builder->where('type', TransactionTypeEnum::Metal->value)->where('client_id', $client->id);
    }

    public function scopeCryptoTransactions(Builder $builder, Client $client): Builder
    {
        return $builder->where('type', TransactionTypeEnum::Crypto->value)->where('client_id', $client->id);
    }
}
