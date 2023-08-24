<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use App\Models\Enum\Api\Balance\BalancePaymentFormEnumType;
use App\Models\Enum\StatusEnumType;
use App\Models\Enum\TypeEnum;
use App\Models\Keys\Key;
use Database\Factories\BalanceRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property BalancePaymentFormEnumType|null $delivery
 * @property int|null $branch_id
 * @property string|null $invoice_file
 * @property StatusEnumType $status
 * @property-read \App\Models\Client\Client $client
 * @property-read Key|null $key
 * @method static \Database\Factories\BalanceRequestFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereInvoiceFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereKeyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereUsdtType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereWithdraw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceRequest whereWithdrawAccountNumber($value)
 * @mixin \Eloquent
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
}
