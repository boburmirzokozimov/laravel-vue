<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Client\Metal
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $card_type
 * @property int|null $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|Metal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Metal whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metal whereCardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metal whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Metal extends CustomModel
{
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
