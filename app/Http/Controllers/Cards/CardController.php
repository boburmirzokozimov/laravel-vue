<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Models\Client\CreditCard\CreditCardRequest;
use Inertia\Inertia;

class CardController extends Controller
{
    public function cards()
    {
        return Inertia::render('Cards/Index')->with([
            'cards' => CreditCardRequest::all()
        ]);
    }
}
