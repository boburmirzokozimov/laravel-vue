<?php

namespace App\Models\Client\CreditCard;

use App\Models\Client\Client;
use App\Models\CustomModel;
use Database\Factories\CreditCardFactory;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client\CreditCard\CreditCard
 *
 * @property int $id
 * @property int $client_id
 * @property string $card_number
 * @property string $expire_date
 * @property string $balance
 * @property int $credit_card_request_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, CardTransaction> $cardTransactions
 * @property-read int|null $card_transactions_count
 * @property-read Client $client
 * @property-read CreditCardRequest $credit_card_request
 * @method static CreditCardFactory factory($count = null, $state = [])
 * @method static Builder|CreditCard newModelQuery()
 * @method static Builder|CreditCard newQuery()
 * @method static Builder|CreditCard query()
 * @method static Builder|CreditCard whereBalance($value)
 * @method static Builder|CreditCard whereCardNumber($value)
 * @method static Builder|CreditCard whereClientId($value)
 * @method static Builder|CreditCard whereCreatedAt($value)
 * @method static Builder|CreditCard whereCreditCardRequestId($value)
 * @method static Builder|CreditCard whereExpireDate($value)
 * @method static Builder|CreditCard whereId($value)
 * @method static Builder|CreditCard whereUpdatedAt($value)
 * @mixin Eloquent
 */
class CreditCard extends CustomModel
{
    use HasFactory, SoftDeletes;

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

    public function createTransaction(array $credentials)
    {
        unset($credentials['withdraw']);
        return $this->cardTransactions()->create($credentials);
    }

    public function cardTransactions(): HasMany
    {
        return $this->hasMany(CardTransaction::class);
    }

    public function depositBalance(int $sum): void
    {
        $this->balance += $sum;
        $this->save();
    }

    /**
     * @throws Exception
     */
    public function withdrawBalance(int $sum): void
    {
        $this->balance -= $sum;
        $this->save();
        if ($this->balance < 0) {
            throw new Exception('Недостаточно средств');
        }
    }
}
