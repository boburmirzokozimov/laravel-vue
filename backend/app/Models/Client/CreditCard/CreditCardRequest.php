<?php

namespace App\Models\Client\CreditCard;

use App\Models\CustomModel;
use App\Models\Enum\CreditCardStatusEnumType;
use Database\Factories\CreditCardRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function creditCard(): HasOne
    {
        return $this->hasOne(CreditCard::class);
    }
}
