<?php

namespace App\Models\RefreshToken;

use App\Models\Client\Client;
use App\Models\CustomModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class RefreshToken extends CustomModel
{
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function tokenable(): MorphTo
    {
        return $this->morphTo();
    }
}
