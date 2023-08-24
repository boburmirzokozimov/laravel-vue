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
            return response()->json(
                $this->authService->handleLogin($client)
            );
        }

        return response()->json([
            'error' => 'Invalid credentials'
        ], 400);
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
                'name' => $client->full_name,
                'show_id' => $client->show_id,
                'status' => $client->isActive(),
                'balance' => $client->balance,
                'phone' => $client->phone
            ];
        } else {
            $credentials = [
                'name' => $client->full_name,
                'status' => $client?->isActive()
            ];
        }

        return response()->json([
            'data' => $credentials
        ]);
    }
}
