<?php

namespace App\Http\Controllers\Client\CreditCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\CreditCardRequest;
use App\Models\Client\CreditCard\CreditCard;
use App\Services\CreditCardService;
use Inertia\Inertia;

class CreditCardController extends Controller
{
    public function __construct(private CreditCardService $service)
    {
    }

    public function update(CreditCardRequest $cardRequest, CreditCard $card)
    {
        $card->update([
            'card_number' => $cardRequest->validated('card_number'),
            'expire_date' => $cardRequest->validated('expire_date'),
        ]);

        $card->save();

        return back();
    }

    public function create(CreditCard $card)
    {
        return Inertia::render('Clients/CreditCard/Payment/ManageBalance')
            ->with([
                'card' => $card
            ]);
    }

    public function manage(CreateTransactionRequest $request, CreditCard $card)
    {
        $this->service->createTransaction($request->validated(), $card);
        $card->createTransaction($request->validated());

        return to_route('clients.show', ['client' => $card->client->id]);
    }
}
