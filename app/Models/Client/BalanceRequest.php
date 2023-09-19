<?php

namespace App\Models\Client;

use App\Models\Client\CreditCard\CreditCard;
use App\Models\CustomModel;
use App\Models\Enum\Api\Balance\BalancePaymentFormEnumType;
use App\Models\Enum\StatusEnumType;
use App\Models\Enum\TypeEnum;
use App\Models\Keys\Key;
use Database\Factories\BalanceRequestFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client\BalanceRequest
 *
 * @property int $id
 * @property int $client_id
 * @property int|null $country_id
 * @property string|null $currency
 * @property TypeEnum $type
 * @property string|null $usdt_type
 * @property string|null $contact
 * @property string|null $phone
 * @property string|null $info
 * @property int|null $key_id
 * @property string|null $withdraw_account_number
 * @property bool $withdraw
 * @property string $sum
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property BalancePaymentFormEnumType|null $delivery
 * @property int|null $branch_id
 * @property string|null $invoice_file
 * @property StatusEnumType $status
 * @property-read Client $client
 * @property-read Key|null $key
 * @method static BalanceRequestFactory factory($count = null, $state = [])
 * @method static Builder|BalanceRequest newModelQuery()
 * @method static Builder|BalanceRequest newQuery()
 * @method static Builder|BalanceRequest query()
 * @method static Builder|BalanceRequest whereBranchId($value)
 * @method static Builder|BalanceRequest whereClientId($value)
 * @method static Builder|BalanceRequest whereContact($value)
 * @method static Builder|BalanceRequest whereCountryId($value)
 * @method static Builder|BalanceRequest whereCreatedAt($value)
 * @method static Builder|BalanceRequest whereCurrency($value)
 * @method static Builder|BalanceRequest whereDelivery($value)
 * @method static Builder|BalanceRequest whereId($value)
 * @method static Builder|BalanceRequest whereInfo($value)
 * @method static Builder|BalanceRequest whereInvoiceFile($value)
 * @method static Builder|BalanceRequest whereKeyId($value)
 * @method static Builder|BalanceRequest wherePhone($value)
 * @method static Builder|BalanceRequest whereStatus($value)
 * @method static Builder|BalanceRequest whereSum($value)
 * @method static Builder|BalanceRequest whereType($value)
 * @method static Builder|BalanceRequest whereUpdatedAt($value)
 * @method static Builder|BalanceRequest whereUsdtType($value)
 * @method static Builder|BalanceRequest whereWithdraw($value)
 * @method static Builder|BalanceRequest whereWithdrawAccountNumber($value)
 * @property int|null $credit_card_id
 * @property int|null $metal_and_crypto_currency_transaction_id
 * @property-read CreditCard|null $creditCard
 * @property-read \App\Models\Client\MetalAndCryptoCurrencyTransaction|null $metalAndCryptoCurrencyTransaction
 * @method static Builder|BalanceRequest whereCreditCardId($value)
 * @method static Builder|BalanceRequest whereMetalAndCryptoCurrencyTransactionId($value)
 * @mixin Eloquent
 */
class BalanceRequest extends CustomModel
{
    use HasFactory;

    protected $casts = [
        'type' => TypeEnum::class,
        'status' => StatusEnumType::class,
        'delivery' => BalancePaymentFormEnumType::class
    ];

    protected static function newFactory(): BalanceRequestFactory
    {
        return new BalanceRequestFactory();
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function key(): HasOne
    {
        return $this->hasOne(Key::class);
    }

    public function creditCard(): BelongsTo
    {
        return $this->belongsTo(CreditCard::class);
    }

    public function metalAndCryptoCurrencyTransaction(): BelongsTo
    {
        return $this->BelongsTo(MetalAndCryptoCurrencyTransaction::class);
    }
}
