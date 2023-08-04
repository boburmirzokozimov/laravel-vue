<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use App\Models\Enum\StatusEnumType;
use App\Models\Enum\TypeEnum;
use Database\Factories\BalanceRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BalanceRequest extends CustomModel
{
    use HasFactory;

    protected $casts = [
        'type' => TypeEnum::class,
        'status' => StatusEnumType::class
    ];

    protected static function newFactory(): BalanceRequestFactory
    {
        return new BalanceRequestFactory();
    }
}
