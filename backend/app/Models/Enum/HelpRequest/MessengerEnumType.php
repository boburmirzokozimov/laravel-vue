<?php

namespace App\Models\Enum\HelpRequest;

enum MessengerEnumType: string
{
    case Телеграмм = 'TELEGRAM';
    case WhatsApp = 'WHATSAPP';
}
