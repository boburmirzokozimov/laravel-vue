<?php

namespace App\Models\Branch;

use App\Models\Country\Country;
use App\Models\CustomModel;
use Database\Factories\BranchFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Branch\Branch
 *
 * @property int $id
 * @property string $lat
 * @property string $lon
 * @property string $address
 * @property string|null $contact_number
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $full_address
 * @property string|null $contact_email
 * @property string|null $working_hours
 * @property-read Country|null $country
 * @method static \Database\Factories\BranchFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereFullAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereWorkingHours($value)
 * @property string|null $photo
 * @property string|null $start_hour
 * @property string|null $end_hour
 * @property string|null $name
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereEndHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereStartHour($value)
 * @mixin \Eloquent
 */
class Branch extends CustomModel
{
    use HasFactory;

    protected static function newFactory(): BranchFactory
    {
        return new BranchFactory();
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
