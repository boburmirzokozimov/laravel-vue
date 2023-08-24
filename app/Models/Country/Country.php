<?php

namespace App\Models\Country;

use App\Models\Branch\Branch;
use App\Models\CustomModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
