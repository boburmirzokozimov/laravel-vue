<?php

namespace App\Http\Controllers\Api\VisaCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VisaCard\VisaCardRequestForm;
use App\Http\Requests\Api\VisaCard\VisaCardTransactionRequestForm;
use App\Http\Requests\CreateTransactionRequest;
use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCard;
use App\Services\CreditCardService;

class VisaCardController extends Controller
{
    public function __construct(private CreditCardService $cardService)
    {
    }

    public function store(VisaCardRequestForm $request)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        if (request()->input('anonymous')) {
            $this->cardService->handleAnonymous($request->validated(), $client);
        } else {
            $this->cardService->handle($request->validated(), $client);
        }

        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function manage(VisaCardTransactionRequestForm $request, CreditCard $card)
    {
        $client = Client::findByToken($request->bearerToken())->first();
        $credentials = $request->validated();
        $credentials['client_id'] = $client->id;

        $this->cardService->createTransaction($credentials, $card);

        return response()->json([
            'message' => 'Success'
        ]);
    }
}
