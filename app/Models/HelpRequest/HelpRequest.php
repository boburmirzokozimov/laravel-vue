<?php

namespace App\Models\HelpRequest;

use App\Models\CustomModel;
use App\Models\Enum\Api\HelpRequest\MessengerEnumType;
use App\Models\Enum\Api\HelpRequest\PreferredLanguageEnumType;

/**
 * App\Models\HelpRequest\HelpRequest
 *
 * @property int $id
 * @property string $phone
 * @property string $name
 * @property PreferredLanguageEnumType $preferred_language
 * @property MessengerEnumType $messenger_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest whereMessengerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest wherePreferredLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HelpRequest extends CustomModel
{
    protected $casts = [
        'messenger_type' => MessengerEnumType::class,
        'preferred_language' => PreferredLanguageEnumType::class
    ];
}
