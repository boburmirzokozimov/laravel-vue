<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Repositories\ClientRepository;
use App\Services\AuthService;
use App\Services\TokenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService      $authService,
                                private readonly TokenService     $tokenService,
                                private readonly ClientRepository $clientRepository)
    {
    }

    public function login()
    {
        $credentials = request()->validate([
            'uuid' => 'string|required',
            'auth_key' => 'string|required'
        ]);

        $client = Client::query()
            ->where('auth_key', $credentials['auth_key'])
            ->first();

        if ($client) {
            $client->update([
                'uuid' => $credentials['uuid'],
            ]);
            return response()->json([
                'data' => $this->authService->handleLogin($client)
            ]);
        }

        return response()->json([
            'error' => 'Invalid credentials'
        ], 401);
    }

    //TODO handle Auth Controller


    public function refresh(Request $request)
    {
        return $this->tokenService->refreshTokens($request);
    }

    public function me(Request $request)
    {
        $client = $this->clientRepository->findByToken($request->bearerToken());

        if ($client?->isActive()) {
            $credentials = [
                'client_id' => $client->id,
                'status' => $client->isActive(),
                'balance' => $client->balance,
                'phone' => $client->phone,
                'cards' => $client->creditCard()
                    ->get()
                    ->map(function ($card) {
                        return [
                            'id' => $card->id,
                            'balance' => $card->balance
                        ];
                    }),
                'card_transactions' => $client->cardTransactions()
                    ->get()
                    ->map(function ($cardTransactions) {
                        return [
                            'id' => $cardTransactions->id,
                            'sum' => $cardTransactions->sum
                        ];
                    }),
            ];
        } else {
            $credentials = [
                'client_id' => $client?->id,
                'status' => $client?->isActive()
            ];
        }

        return response()->json([
            'data' => $credentials
        ]);
    }
}
