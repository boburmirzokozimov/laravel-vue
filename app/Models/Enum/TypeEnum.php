<?php

namespace App\Models\Enum;

enum TypeEnum: string
{
    case CASH = 'CASH';
    case CASHLESS = 'CASHLESS';
    case USDT = 'USDT';
    case SWIFT = 'SWIFT';
    case SEPA = 'SEPA';
    case CARD_TRANSACTION = 'CARD_TRANSACTION';
}
