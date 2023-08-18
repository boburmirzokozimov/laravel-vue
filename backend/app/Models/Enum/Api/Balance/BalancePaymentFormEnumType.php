<?php

namespace App\Models\Enum\Api\Balance;

enum BalancePaymentFormEnumType: string
{
    case OFFICE = "office";
    case COURIER = "courier";
}
