<?php

namespace App\Http\Controllers\Api\VisaCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VisaCard\VisaCardRequestForm;
use App\Http\Requests\Api\VisaCard\VisaCardTransactionRequestForm;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Services\CreditCardService;
use Auth;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VisaCardController extends Controller
{
    public function __construct(private CreditCardService $cardService)
    {
    }

    public function store(VisaCardRequestForm $request)
    {
        $client = Auth::user();

        if (request()->input('anonymous')) {
            $this->cardService->handleAnonymous($request->validated(), $client);
        } else {
            $this->cardService->handle($request->validated(), $client);
        }

        $client->notifyUser([
            'card'
        ]);

        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function manage(VisaCardTransactionRequestForm $request, CreditCard $card)
    {
        $client = Auth::user();
        $credentials = $request->validated();
        $credentials['client_id'] = $client->id;
        try {
            $this->cardService->createTransaction($credentials, $card);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e
            ], 400);
        }

        return response()->json([
            'message' => 'Success'
        ]);
    }


    public function cards(Request $request): JsonResponse
    {
        $client = Auth::user();

        /** @var CreditCardRequest[] $cards */
        $cards = CreditCardRequest::where('client_id', $client->id)->paginate(10);
        $result = [];
        foreach ($cards as $card) {
            $result[] = [
                'id' => $card->creditCard?->id ?? $card->id,
                'balance' => $card->creditCard?->balance ?? 0,
                'card_number' => $card->creditCard?->card_number,
                'expire_date' => $card->creditCard?->expire_date,
                'status' => $card->status,
                'card_holder' => $card->ownerName(),
                'anonymous' => $card->anonymous
            ];
        }
        return response()->json(['data' => $result]);
    }
}
