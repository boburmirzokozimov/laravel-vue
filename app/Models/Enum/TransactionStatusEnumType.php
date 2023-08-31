<?php

namespace App\Models\Enum;

enum TransactionStatusEnumType: string
{
    case WAITING = 'WAITING';
    case SUCCESS = 'SUCCESS';
    case FAILED = 'FAILED';
}
