<?php

namespace App\Models\Country;

use App\Models\Branch\Branch;
use App\Models\CustomModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Country\Country
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $flag
 * @property string|null $name
 * @property string|null $name_common
 * @property string|null $name_official
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Branch> $branches
 * @property-read int|null $branches_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNameCommon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNameOfficial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Country extends CustomModel
{
    protected $casts = [
        'name_native' => 'array'
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
