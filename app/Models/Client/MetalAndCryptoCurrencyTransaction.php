<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use App\Models\Enum\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Client\MetalAndCryptoCurrencyTransaction
 *
 * @property int $id
 * @property TransactionTypeEnum|null $type
 * @property string|null $sort
 * @property int|null $sum
 * @property bool $withdraw
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float|null $quantity
 * @property string|null $status
 * @property int|null $balance_request_id
 * @property-read \App\Models\Client\BalanceRequest|null $balanceRequest
 * @property-read \App\Models\Client\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereBalanceRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalAndCryptoCurrencyTransaction whereWithdraw($value)
 * @mixin \Eloquent
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
}
