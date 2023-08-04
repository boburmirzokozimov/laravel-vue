<?php

namespace App\Models\Enum;

enum TypeEnum: string
{
    case CASH = 'CASH';
    case CASHLESS = 'CASHLESS';
    case USDT = 'USDT';
}
