<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Chat\Message;
use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\User\User
 *
 * @property int $id
 * @property string|null $full_name
 * @property string $phone
 * @property string|null $country
 * @property bool $is_active
 * @property bool $is_banned
 * @property int|null $role_id
 * @property string|null $login_code
 * @property string|null $last_visited
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Message|null $messages
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Role|null $role
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User phone(string $phone)
 * @method static \Illuminate\Database\Eloquent\Builder|User phoneAndCode(string $phone, string $code)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastVisited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'phone',
        'country',
        'login_code',
        'is_active',
        'is_banned',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_banned' => 'boolean',
    ];

    public static function scopePhone(Builder $query, string $phone)
    {
        return $query->where('phone', $phone);
    }

    public static function scopePhoneAndCode(Builder $query, string $phone, string $code)
    {
        return $query->where('phone', $phone)->where('login_code', $code);
    }

    protected static function newFactory(): UserFactory
    {
        return new UserFactory();
    }

    public function path(): string
    {
        return '/users/' . $this->id;
    }

    public function assignRole(int $role): void
    {
        $this->role_id = $role;
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function messages(): MorphOne
    {
        return $this->morphOne(Message::class, 'messageble');
    }
}
