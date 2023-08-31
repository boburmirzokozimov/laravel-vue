<?php

namespace App\Models\Client;

use App\Models\Chat\Message;
use App\Models\Client\CreditCard\CardTransaction;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Models\Client\Crypto\CryptoCurrency;
use App\Models\Client\Metal\Metal;
use App\Models\Enum\StatusEnumType;
use App\Models\RefreshToken\RefreshToken;
use Database\Factories\ClientFactory;
use Eloquent;
use Exception;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client\Client
 *
 * @property int $id
 * @property string $full_name
 * @property string|null $uuid
 * @property string $phone
 * @property string|null $access_token
 * @property bool $is_active
 * @property string|null $auth_key
 * @property string|null $comments
 * @property string $balance
 * @property string|null $last_visited
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $show_id
 * @property-read Collection<int, BalanceRequest> $balanceRequest
 * @property-read int|null $balance_request_count
 * @property-read Collection<int, CardTransaction> $cardTransactions
 * @property-read int|null $card_transactions_count
 * @property-read Collection<int, CreditCard> $creditCard
 * @property-read int|null $credit_card_count
 * @property-read Collection<int, CreditCardRequest> $creditCardRequest
 * @property-read int|null $credit_card_request_count
 * @property-read Collection<int, CryptoCurrency> $cryptoCurrencies
 * @property-read int|null $crypto_currencies_count
 * @property-read Message|null $messages
 * @property-read Collection<int, Metal> $metals
 * @property-read int|null $metals_count
 * @property-read RefreshToken|null $refreshToken
 * @method static ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client findByToken(?string $access_token)
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAuthKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLastVisited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereShowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUuid($value)
 * @mixin Eloquent
 */
class Client extends Authenticatable
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function scopeFindByToken(Builder $query, ?string $access_token)
    {
        return $query->where(['access_token' => $access_token]);
    }

    protected static function newFactory(): ClientFactory
    {
        return new ClientFactory();
    }

    public function clientPath(): string
    {
        return '/clients/' . $this->id;
    }

    public function manageBalance(array $credentials, bool $isRequisite = false): void
    {

        if (isset($credentials['withdraw']) and $credentials['withdraw']) {
            $credentials['status'] = 'HOLD';
            $this->subtractionFromBalance($credentials['sum']);
            $this->save();
        }

        if ($isRequisite) {
            $credentials['withdraw'] = true;
            $credentials['status'] = 'HOLD';
            $this->subtractionFromBalance($credentials['sum']);
            $this->save();
        }

        $this->balanceRequest()->create($credentials);
    }

    /**
     * @throws Exception
     */
    public function subtractionFromBalance(float $sum): void
    {
        $this->balance -= $sum;
        if ($this->balance < 0) {
            throw new Exception('Не достаточно средств');
        }
        $this->save();

    }

    public function balanceRequest(): HasMany
    {
        return $this->hasMany(BalanceRequest::class);
    }

    /**
     * @throws Exception
     */
    public function activate(BalanceRequest $balanceRequest): void
    {
        if (!$balanceRequest->withdraw) {
            $this->addToBalance($balanceRequest->sum);
        }

//        else {
//            $this->subtractionFromBalance($balanceRequest->sum);
//        }
        $balanceRequest->status = StatusEnumType::SUCCESS->name;
        $balanceRequest->save();
        $this->save();
    }

    public function addToBalance(float $sum): void
    {
        $this->balance += $sum;
        $this->save();
    }

    public function saveCardRequest(array $credentials): void
    {
        $this->creditCardRequest()->create($credentials);
    }

    public function creditCardRequest(): HasMany
    {
        return $this->hasMany(CreditCardRequest::class);
    }

    public function creditCard(): HasMany
    {
        return $this->hasMany(CreditCard::class);
    }

    public function messages(): MorphOne
    {
        return $this->morphOne(Message::class, 'messageble');
    }

    public function storeRefreshToken(string $refresh_token)
    {
        return $this->refreshToken()->create([
            'refresh_token' => $refresh_token
        ]);
    }

    public function refreshToken(): MorphOne
    {
        return $this->morphOne(RefreshToken::class, 'tokenable');
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function transactionHistory()
    {
        return $this->cardTransactions()->get();
    }

    public function cardTransactions(): HasMany
    {
        return $this->hasMany(CardTransaction::class);
    }

    public function invalidateAuthKey(): void
    {
        $this->update([
            'auth_key' => ''
        ]);
    }

    public function validateByToken(string $uuid): bool
    {
        return $this->uuid == $uuid;
    }

    public function metals(): HasMany
    {
        return $this->hasMany(Metal::class);
    }

    public function cryptoCurrencies(): HasMany
    {
        return $this->hasMany(CryptoCurrency::class);
    }

    public function metalTransactions()
    {
        return $this->metalAndCryptoCurrencyTransactions()->where('type', 1)->paginate();
    }

    public function metalAndCryptoCurrencyTransactions(): HasMany
    {
        return $this->hasMany(MetalAndCryptoCurrencyTransaction::class);
    }
}
