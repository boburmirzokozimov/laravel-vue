<?php

namespace App\Models\Client;

use App\Models\Chat\Message;
use App\Models\Client\CreditCard\CardTransaction;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Models\Enum\StatusEnumType;
use App\Models\RefreshToken\RefreshToken;
use Database\Factories\ClientFactory;
use Exception;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    protected static function newFactory()
    {
        return new ClientFactory();
    }

    public function clientPath(): string
    {
        return '/clients/' . $this->id;
    }

    public function manageBalance(array $credentials): void
    {
        $this->balanceRequest()->create($credentials);
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
        } else {
            $this->subtractionFromBalance($balanceRequest->sum);
        }
        $balanceRequest->status = StatusEnumType::SUCCESS->name;
        $balanceRequest->save();
        $this->save();
    }

    public function addToBalance(float $sum): void
    {
        $this->balance += $sum;
    }

    public function subtractionFromBalance(float $sum): void
    {
        $this->balance -= $sum;
        if ($this->balance < 0) {
            throw new Exception('Не достаточно средств');
        }
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

    public function cardHolder(): string
    {
        return $this->credit_card_request->anonymous
            ? $this->credit_card_request->anonymous_name . ' ' . $this->credit_card_request->anonymous_surname
            : $this->credit_card_request->name . ' ' . $this->credit_card_request->surname . ' ' . $this->credit_card_request->middle_name;
    }

    public function metals(): HasMany
    {
        return $this->hasMany(Metal::class);
    }

    public function cryptoCurrencies(): HasMany
    {
        return $this->hasMany(CryptoCurrency::class);
    }
}
