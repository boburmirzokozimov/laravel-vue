<?php

namespace App\Models\HelpRequest;

use App\Models\CustomModel;
use App\Models\Enum\Api\HelpRequest\MessengerEnumType;
use App\Models\Enum\Api\HelpRequest\PreferredLanguageEnumType;

class HelpRequest extends CustomModel
{
    protected $casts = [
        'messenger_type' => MessengerEnumType::class,
        'preferred_language' => PreferredLanguageEnumType::class
    ];
}
