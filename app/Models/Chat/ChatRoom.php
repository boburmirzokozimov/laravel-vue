<?php

namespace App\Models\Chat;

use App\Models\Client\Client;
use App\Models\CustomModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Chat\ChatRoom
 *
 * @property int $id
 * @property bool $completed
 * @property int $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Client $client
 * @property-read Collection<int, Message> $messages
 * @property-read int|null $messages_count
 * @method static Builder|ChatRoom newModelQuery()
 * @method static Builder|ChatRoom newQuery()
 * @method static Builder|ChatRoom query()
 * @method static Builder|ChatRoom whereClientId($value)
 * @method static Builder|ChatRoom whereCompleted($value)
 * @method static Builder|ChatRoom whereCreatedAt($value)
 * @method static Builder|ChatRoom whereId($value)
 * @method static Builder|ChatRoom whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ChatRoom extends CustomModel
{
    protected $casts = [
        'completed' => 'boolean',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class)->orderBy('created_at');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function toggleCompletion(): void
    {
        $this->update(['completed' => !$this->completed]);
    }
}
