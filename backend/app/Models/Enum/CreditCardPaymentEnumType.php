<?php

namespace App\Models\Enum;

enum CreditCardPaymentEnumType: string
{
    case SEPA = "SEPA";
    case SWIFT = "SWIFT";
}
