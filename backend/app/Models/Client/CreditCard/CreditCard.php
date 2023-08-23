<?php

namespace App\Models\Client\CreditCard;

use App\Models\Client\Client;
use App\Models\CustomModel;
use Database\Factories\CreditCardFactory;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CreditCard extends CustomModel
{
    use HasFactory;

    protected static function newFactory(): CreditCardFactory
    {
        return new CreditCardFactory();
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function owner_name(): string
    {
        if ($this->credit_card_request->anonymous) {
            return $this->credit_card_request->anonymous_name . ' ' . $this->credit_card_request->anonymous_surname;
        } else {
            return $this->credit_card_request->name . ' ' . $this->credit_card_request->surname . ' ' . $this->credit_card_request->middle_name;
        }
    }

    public function credit_card_request(): BelongsTo
    {
        return $this->belongsTo(CreditCardRequest::class);
    }

    public function createTransaction(array $credentials): void
    {
        $this->cardTransactions()->create($credentials);
    }

    public function cardTransactions(): HasMany
    {
        return $this->hasMany(CardTransaction::class);
    }

    public function depositBalance(int $sum): void
    {
        $this->balance += $sum;
    }

    /**
     * @throws Exception
     */
    public function withdrawBalance(int $sum): void
    {
        $this->balance -= $sum;
        if ($this->balance < 0) {
            throw new Exception('Недостаточно средств');
        }
    }
}
