<?php

namespace App\Models\Enum\Api\HelpRequest;

enum MessengerEnumType: string
{
    case Телеграмм = 'TELEGRAM';
    case WhatsApp = 'WHATSAPP';
}
