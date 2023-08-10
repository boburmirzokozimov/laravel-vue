<?php

namespace App\Models\Courier;

use App\Models\CustomModel;
use App\Models\Enum\CourierStatusEnumType;
use Database\Factories\CourierFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
