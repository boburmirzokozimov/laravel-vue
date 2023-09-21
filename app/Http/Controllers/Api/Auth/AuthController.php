<?php

namespace App\Http\Controllers\Api\Auth;

use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Services\AuthService;
use App\Services\TokenService;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService  $authService,
                                private readonly TokenService $tokenService)
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
            return response()->json(
                $this->authService->handleLogin($client)
            );
        }

        return response()->json([
            'error' => 'Invalid credentials'
        ], 400);
    }


    public function refresh(Request $request)
    {
        return $this->tokenService->refreshTokens($request);
    }

    public function me(Request $request, Centrifugo $centrifugo)
    {
        $client = Auth::user();

        if ($client?->isActive()) {
            $credentials = [
                'id' => $client->id,
                'name' => $client->full_name,
                'show_id' => $client->show_id,
                'status' => $client->isActive(),
                'balance' => $client->balance,
                'phone' => $client->phone,
                'chat_token' => $centrifugo->generateConnectionToken($client->id)
            ];
        } else {
            $credentials = [
                'id' => $client->id,
                'name' => $client->full_name,
                'show_id' => $client->show_id,
                'status' => $client?->isActive(),
                'chat_token' => $centrifugo->generateConnectionToken($client->id)
            ];
        }

        return response()->json([
            'data' => $credentials
        ]);
    }
}
