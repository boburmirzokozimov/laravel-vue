<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use App\Models\Enum\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MetalAndCryptoCurrencyTransaction extends CustomModel
{
    protected $casts = [
        'type' => TransactionTypeEnum::class,
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
