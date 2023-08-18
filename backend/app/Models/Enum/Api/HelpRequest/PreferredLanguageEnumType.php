<?php

namespace App\Models\Enum\Api\HelpRequest;

enum PreferredLanguageEnumType: string
{
    case Русский = 'RUSSIAN';
    case Английский = 'ENGLISH';
    case Иврит = 'HEBREW';
}
