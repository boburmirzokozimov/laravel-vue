<?php

namespace App\Models\Enum;

enum CreditCardStatusEnumType: string
{
    case PENDING = "PENDING";
    case RELEASED = "RELEASED";
}
