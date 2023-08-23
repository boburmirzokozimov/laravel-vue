<?php

namespace App\Models\Branch;

use App\Models\Country\Country;
use App\Models\CustomModel;
use Database\Factories\BranchFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
