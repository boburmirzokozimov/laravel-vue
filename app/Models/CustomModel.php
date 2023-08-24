<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CustomModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CustomModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomModel query()
 * @mixin \Eloquent
 */
class CustomModel extends Model
{
    protected $guarded = false;
}
