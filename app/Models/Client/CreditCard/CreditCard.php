<?php

namespace App\Models\Client\CreditCard;

use App\Models\Client\Client;
use App\Models\CustomModel;
use Database\Factories\CreditCardFactory;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Client\CreditCard\CreditCard
 *
 * @property int $id
 * @property int $client_id
 * @property string $card_number
 * @property string $expire_date
 * @property string $balance
 * @property int $credit_card_request_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client\CreditCard\CardTransaction> $cardTransactions
 * @property-read int|null $card_transactions_count
 * @property-read Client $client
 * @property-read \App\Models\Client\CreditCard\CreditCardRequest $credit_card_request
 * @method static \Database\Factories\CreditCardFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereCardNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereCreditCardRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        unset($credentials['withdraw']);
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
