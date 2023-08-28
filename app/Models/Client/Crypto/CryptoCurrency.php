<?php

namespace App\Models\Client\Crypto;

use App\Models\Client\Client;
use App\Models\CustomModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client\CryptoCurrency
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $card_type
 * @property int|null $balance
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Client|null $client
 * @method static Builder|CryptoCurrency newModelQuery()
 * @method static Builder|CryptoCurrency newQuery()
 * @method static Builder|CryptoCurrency query()
 * @method static Builder|CryptoCurrency whereBalance($value)
 * @method static Builder|CryptoCurrency whereCardType($value)
 * @method static Builder|CryptoCurrency whereClientId($value)
 * @method static Builder|CryptoCurrency whereCreatedAt($value)
 * @method static Builder|CryptoCurrency whereId($value)
 * @method static Builder|CryptoCurrency whereUpdatedAt($value)
 * @mixin Eloquent
 */
class CryptoCurrency extends CustomModel
{
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
