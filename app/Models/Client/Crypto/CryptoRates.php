<?php

namespace App\Models\Client\Crypto;

use App\Models\CustomModel;
use Illuminate\Contracts\Database\Query\Builder;

class CryptoRates extends CustomModel
{
    public static function scopeLastType(Builder $query, ?string $type)
    {
        return $query->latest()->where('type', $type)->first();
    }
}
