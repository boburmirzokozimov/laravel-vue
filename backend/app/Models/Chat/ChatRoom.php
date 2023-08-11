<?php

namespace App\Models\Chat;

use App\Models\Client\Client;
use App\Models\CustomModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatRoom extends CustomModel
{
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
