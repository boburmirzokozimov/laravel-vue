<?php

namespace App\Models\Client\CreditCard;

use App\Models\CustomModel;
use App\Models\Enum\CreditCardStatusEnumType;
use Database\Factories\CreditCardRequestFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read CreditCard|null $creditCard
 * @method static CreditCardRequestFactory factory($count = null, $state = [])
 * @method static Builder|CreditCardRequest newModelQuery()
 * @method static Builder|CreditCardRequest newQuery()
 * @method static Builder|CreditCardRequest query()
 * @method static Builder|CreditCardRequest whereAnonymous($value)
 * @method static Builder|CreditCardRequest whereAnonymousName($value)
 * @method static Builder|CreditCardRequest whereAnonymousSurname($value)
 * @method static Builder|CreditCardRequest whereBirthDate($value)
 * @method static Builder|CreditCardRequest whereClientId($value)
 * @method static Builder|CreditCardRequest whereCreatedAt($value)
 * @method static Builder|CreditCardRequest whereId($value)
 * @method static Builder|CreditCardRequest whereMiddleName($value)
 * @method static Builder|CreditCardRequest whereName($value)
 * @method static Builder|CreditCardRequest wherePhone($value)
 * @method static Builder|CreditCardRequest whereScanPassport($value)
 * @method static Builder|CreditCardRequest whereSelfiePassport($value)
 * @method static Builder|CreditCardRequest whereStatus($value)
 * @method static Builder|CreditCardRequest whereSurname($value)
 * @method static Builder|CreditCardRequest whereUpdatedAt($value)
 * @mixin Eloquent
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

    public function ownerName(): string
    {
        if ($this->anonymous) {
            return $this->anonymous_name . ' ' . $this->anonymous_surname;
        }
        return $this->name . ' ' . $this->surname;
    }

    protected function formattedDate(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return [
                    'formattedCreatedDate' => Carbon::make($attributes['created_at'])->format('Y-m-d H:i:s'),
                    'formattedBirthDate' => isset($attributes['birth_date']) ? Carbon::make($attributes['birth_date'])->format('Y-m-d H:i:s') : '',
                ];
            }
        );
    }
}
