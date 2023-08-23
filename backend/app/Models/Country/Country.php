<?php

namespace App\Models\Country;

use App\Models\CustomModel;

class Country extends CustomModel
{
    protected $casts = [
        'name_native' => 'array'
    ];
}
