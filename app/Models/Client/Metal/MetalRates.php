<?php

namespace App\Models\Client\Metal;

use App\Models\CustomModel;
use Illuminate\Contracts\Database\Query\Builder;

/**
 * App\Models\Client\Metal\MetalRates
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $rate
 * @property string|null $diff
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates lastType(?string $type)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates query()
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates whereDiff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetalRates whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MetalRates extends CustomModel
{
    public static function scopeLastType(Builder $query, ?string $type)
    {
        return $query->latest()->where('type', $type)->first();
    }
}
