<?php

namespace App\Models\Enum;

enum CourierStatusEnumType: string
{
    case ACTIVE = "active";
    case INACTIVE = "inactive";
    case BLOCKED = "blocked";
}
