<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Models\Enum\CreditCardStatusEnumType;
use Inertia\Inertia;

class CardController extends Controller
{
    public function index()
    {
        return Inertia::render('Cards/Index')->with([
            'cards' => CreditCardRequest::query()
                ->where('status', CreditCardStatusEnumType::PENDING->value)
                ->get()
                ->map(function ($card) {
                    return [
                        "id" => $card->id,
                        "client_id" => $card->client_id,
                        "status" => $card->status,
                        "name" => $card->name,
                        "surname" => $card->surname,
                        "middle_name" => $card->middle_name,
                        "phone" => $card->phone,
                        "birth_date" => $card->birth_date,
                        "scan_passport" => $card->scan_passport,
                        "selfie_passport" => $card->selfie_passport,
                        "anonymous" => $card->anonymous,
                        "anonymous_surname" => $card->anonymous_surname,
                        "anonymous_name" => $card->anonymous_name,
                        "formattedDate" => $card->formattedDate,
                        "created_at" => $card->created_at,
                    ];
                })
        ]);
    }
}
