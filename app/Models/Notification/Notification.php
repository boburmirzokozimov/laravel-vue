<?php

namespace App\Models\Notification;

use App\Models\Chat\Message;
use App\Models\Client\Client;
use App\Models\CustomModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Notification\Notification
 *
 * @property int $id
 * @property string|null $type
 * @property bool $isRead
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Notification countUnreadNotifications()
 * @method static Builder|Notification newModelQuery()
 * @method static Builder|Notification newQuery()
 * @method static Builder|Notification query()
 * @method static Builder|Notification unreadNotifications()
 * @method static Builder|Notification whereCreatedAt($value)
 * @method static Builder|Notification whereId($value)
 * @method static Builder|Notification whereIsRead($value)
 * @method static Builder|Notification whereType($value)
 * @method static Builder|Notification whereUpdatedAt($value)
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @method static Builder|Notification whereNotifiableId($value)
 * @method static Builder|Notification whereNotifiableType($value)
 * @property-read Client $client
 * @property-read Message|null $message
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @mixin Eloquent
 */
class Notification extends CustomModel
{
    protected $with = ['message'];

    public function scopeUnreadNotifications(Builder $builder)
    {
        return $builder->where('isRead', false);
    }

    public function scopeCountUnreadNotifications(Builder $builder)
    {
        return $builder->where('isRead', false)->count();
    }

    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                return \Carbon\Carbon::make($value)->format('Y-m-d H:i:s');
            }
        );
    }

    public function markAsRead(): void
    {
        $this->update([
            'isRead' => true
        ]);
    }

}
