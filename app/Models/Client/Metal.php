<?php

namespace App\Models\Client;

use App\Models\CustomModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client\Metal
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $card_type
 * @property int|null $balance
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Client|null $client
 * @method static Builder|Metal newModelQuery()
 * @method static Builder|Metal newQuery()
 * @method static Builder|Metal query()
 * @method static Builder|Metal whereBalance($value)
 * @method static Builder|Metal whereCardType($value)
 * @method static Builder|Metal whereClientId($value)
 * @method static Builder|Metal whereCreatedAt($value)
 * @method static Builder|Metal whereId($value)
 * @method static Builder|Metal whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Metal extends CustomModel
{
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
