<?php

namespace App\Models\Client\CreditCard;

use App\Models\CustomModel;
use App\Models\Enum\CreditCardStatusEnumType;
use Database\Factories\CreditCardRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreditCardRequest extends CustomModel
{
    use HasFactory;

    protected $casts = [
        'status' => CreditCardStatusEnumType::class
    ];

    protected static function newFactory(): CreditCardRequestFactory
    {
        return new CreditCardRequestFactory();
    }

    public function updateCardRequest(array $credentials): void
    {
        $this->update($credentials);
    }
}
