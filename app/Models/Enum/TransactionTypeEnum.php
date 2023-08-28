<?php

namespace App\Models\Enum;

enum TransactionTypeEnum: int
{
    case Metal = 1;
    case Crypto = 2;
}
