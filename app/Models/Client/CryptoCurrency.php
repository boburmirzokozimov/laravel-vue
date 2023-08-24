<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CryptoCurrency extends CustomModel
{
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
