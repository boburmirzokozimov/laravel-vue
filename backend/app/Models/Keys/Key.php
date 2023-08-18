<?php

namespace App\Models\Keys;

use App\Models\CustomModel;
use Database\Factories\KeyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Key extends CustomModel
{
    use HasFactory;

    protected static function newFactory(): KeyFactory
    {
        return new KeyFactory();
    }
}
