<?php

namespace App\Models\Courier;

use App\Models\CustomModel;
use App\Models\Enum\CourierStatusEnumType;
use Database\Factories\CourierFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Courier\Courier
 *
 * @property int $id
 * @property string $country
 * @property string $fullName
 * @property string $phone
 * @property string|null $login_code
 * @property CourierStatusEnumType $status
 * @property string|null $last_visited
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CourierFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Courier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Courier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Courier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereLastVisited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereLoginCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courier whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Courier extends CustomModel
{
    use HasFactory;

    protected $casts = [
        'status' => CourierStatusEnumType::class
    ];

    protected static function newFactory(): CourierFactory
    {
        return new CourierFactory();
    }
}
