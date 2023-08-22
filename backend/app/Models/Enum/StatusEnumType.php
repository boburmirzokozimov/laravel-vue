<?php

namespace App\Models\Enum;

enum StatusEnumType: string
{
    case WAITING = 'WAITING';
    case HOLD = 'HOLD';
    case SUCCESS = 'SUCCESS';
    case CANCELED = 'CANCELED';
    case VERIFICATION = 'VERIFICATION';
}
