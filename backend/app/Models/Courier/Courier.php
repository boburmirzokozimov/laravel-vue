<?php

namespace App\Models\Courier;

use App\Models\CustomModel;
use Database\Factories\CourierFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courier extends CustomModel
{
    use HasFactory;

    protected static function newFactory(): CourierFactory
    {
        return new CourierFactory();
    }
}
