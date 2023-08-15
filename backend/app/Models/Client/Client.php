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
        $balanceRequest->status = StatusEnumType::CLOSED->name;
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

    public function cardTransactions(): HasMany
    {
        return $this->hasMany(CardTransaction::class);
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
}
