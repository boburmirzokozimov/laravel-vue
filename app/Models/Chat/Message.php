<?php

namespace App\Models\Chat;

use App\Models\CustomModel;
use App\Models\User\User;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Chat\Message
 *
 * @property int $id
 * @property string $messageble_type
 * @property int $messageble_id
 * @property int $chat_room_id
 * @property string|null $type
 * @property string $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read ChatRoom $chatRoom
 * @property-read Model|Eloquent $messageble
 * @property-read User|null $user
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereChatRoomId($value)
 * @method static Builder|Message whereCreatedAt($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereMessage($value)
 * @method static Builder|Message whereMessagebleId($value)
 * @method static Builder|Message whereMessagebleType($value)
 * @method static Builder|Message whereType($value)
 * @method static Builder|Message whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Message extends CustomModel
{

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chatRoom(): BelongsTo
    {
        return $this->belongsTo(ChatRoom::class);
    }

    public function messageble()
    {
        return $this->morphTo();
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => [
                'diffForHumans' => Carbon::make($value)->diffForHumans(),
                'isToday' => Carbon::make($value)->isToday(),
                'isCurrentYear' => Carbon::make($value)->isCurrentYear(),
                'day' => Carbon::make($value)->format('l jS \\of F'),
                'formatted' => Carbon::make($value)->format('d/m/y H:i'),
                'unformatted' => $value,
            ]
        );
    }
}
