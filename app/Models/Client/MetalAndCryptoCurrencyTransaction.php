<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use App\Models\Enum\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MetalAndCryptoCurrencyTransaction extends CustomModel
{
    protected $casts = [
        'type' => TransactionTypeEnum::class,
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function balanceRequest(): HasOne
    {
        return $this->hasOne(BalanceRequest::class);
    }
}
