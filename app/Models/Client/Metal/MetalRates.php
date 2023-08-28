<?php

namespace App\Models\Client\Metal;

use App\Models\CustomModel;
use Illuminate\Contracts\Database\Query\Builder;

class MetalRates extends CustomModel
{
    public static function scopeLastType(Builder $query, ?string $type)
    {
        return $query->latest()->where('type', $type)->first();
    }
}
