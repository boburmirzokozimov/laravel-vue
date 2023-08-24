<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Client\CryptoCurrency
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $card_type
 * @property int|null $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency query()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency whereCardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoCurrency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CryptoCurrency extends CustomModel
{
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
