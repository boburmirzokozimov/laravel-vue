<?php

namespace App\Models\Client\Crypto;

use App\Models\CustomModel;
use Illuminate\Contracts\Database\Query\Builder;

/**
 * App\Models\Client\Crypto\CryptoRates
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $rate
 * @property string|null $diff
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates lastType(?string $type)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates query()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates whereDiff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptoRates whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CryptoRates extends CustomModel
{
    public static function scopeLastType(Builder $query, ?string $type)
    {
        return $query->latest()->where('type', $type)->first();
    }
}
