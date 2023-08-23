<?php

namespace App\Models\Branch;

use App\Models\CustomModel;
use Database\Factories\BranchFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends CustomModel
{
    use HasFactory;

    protected static function newFactory()
    {
        return new BranchFactory();
    }
}
