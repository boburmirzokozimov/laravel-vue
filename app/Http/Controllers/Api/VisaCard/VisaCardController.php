<?php

namespace App\Http\Controllers\Api\VisaCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VisaCard\VisaCardRequestForm;
use App\Http\Requests\Api\VisaCard\VisaCardTransactionRequestForm;
use App\Http\Requests\CreateTransactionRequest;
use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Services\CreditCardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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


    public function cards(Request $request): JsonResponse
    {
        $client = Client::findByToken($request->bearerToken())->first();
        //TODO:Im here

        /** @var CreditCardRequest[] $cards */
        $cards = CreditCardRequest::where('client_id', $client->id)->paginate(10);
        $result = [];
        foreach ($cards as $card) {
            $result[] = [
                'id' => $card->creditCard?->id ?? $card->id,
                'balance' => $card->balance,
                'card_number' => $card->creditCard?->card_number,
                'expire_date' => $card->creditCard?->expire_date,
                'status' => $card->status,
                'card_holder' => $card->ownerName()
            ];
        }
        return response()->json(['data' => $result]);
        dd($client->creditCardRequest->where('id', 1)->first()->status, $client->creditCardRequest->where('id', 1)->first()->creditCard);
        return response()->json(
            $client->creditCard()
                ->simplePaginate(10)
                ->through(function ($card) {
                    return [
                        'id' => $card->id,
                        'balance' => $card->balance,
                        'card_number' => $card->card_number,
                        'expire_date' => $card->expire_date,
                        'status' => $card->credit_card_request->status,
                        'card_holder' => $card->owner_name()
                    ];
                }),
        );
    }
}
