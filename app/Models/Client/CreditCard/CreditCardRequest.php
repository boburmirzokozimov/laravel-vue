<?php

namespace App\Models\Client\CreditCard;

use App\Models\CustomModel;
use App\Models\Enum\CreditCardStatusEnumType;
use Database\Factories\CreditCardRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Client\CreditCard\CreditCardRequest
 *
 * @property int $id
 * @property int $client_id
 * @property CreditCardStatusEnumType $status
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $middle_name
 * @property string|null $phone
 * @property string|null $birth_date
 * @property string|null $scan_passport
 * @property string|null $selfie_passport
 * @property bool $anonymous
 * @property string|null $anonymous_surname
 * @property string|null $anonymous_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client\CreditCard\CreditCard|null $creditCard
 * @method static \Database\Factories\CreditCardRequestFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereAnonymous($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereAnonymousName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereAnonymousSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereScanPassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereSelfiePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCardRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CreditCardRequest extends CustomModel
{
    use HasFactory;

    protected $casts = [
        'status' => CreditCardStatusEnumType::class
    ];

    protected static function newFactory(): CreditCardRequestFactory
    {
        return new CreditCardRequestFactory();
    }

    public function updateCardRequest(array $credentials): void
    {
        $this->update($credentials);
    }

    public function creditCard(): HasOne
    {
        return $this->hasOne(CreditCard::class);
    }

    public function ownerName():string
    {
        if ($this->anonymous) {
            return $this->anonymous_name . ' ' . $this->anonymous_surname;
        }
        return $this->name . ' ' . $this->surname;
    }
}
