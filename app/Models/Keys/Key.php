<?php

namespace App\Models\Keys;

use App\Models\CustomModel;
use Database\Factories\KeyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Keys\Key
 *
 * @property int $id
 * @property string|null $account_number_swift
 * @property string|null $account_number_sepa
 * @property string|null $wallet_number_erc
 * @property string|null $wallet_number_trc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\KeyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Key newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Key newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Key query()
 * @method static \Illuminate\Database\Eloquent\Builder|Key whereAccountNumberSepa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Key whereAccountNumberSwift($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Key whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Key whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Key whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Key whereWalletNumberErc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Key whereWalletNumberTrc($value)
 * @mixin \Eloquent
 */
class Key extends CustomModel
{
    use HasFactory;

    protected static function newFactory(): KeyFactory
    {
        return new KeyFactory();
    }
}
