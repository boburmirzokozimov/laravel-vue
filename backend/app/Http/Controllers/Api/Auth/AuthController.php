<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Repositories\TokenRepository;
use App\Services\AuthService;
use App\Services\TokenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService     $authService,
                                private TokenService    $tokenService,
                                private TokenRepository $tokenRepository)
    {
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login()
    {
        $credentials = request()->validate([
            'phone' => 'numeric|required',
            'auth_key' => 'string|required'
        ]);

        $client = Client::query()
            ->where('phone', $credentials['phone'])
            ->where('auth_key', $credentials['auth_key'])
            ->first();

        if ($client) {
            $access_token = $this->authService->handleLogin($client);
            return response()->json([
                'access_token' => $access_token
            ]);
        }

        return response()->json([
            'error' => 'Invalid credentials'
        ], 401);
    }

    //TODO handle Auth Controller
    

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(Request $request)
    {
        return response()->json([
            'data' => $this->tokenService->refreshToken($request)
        ]);
    }
}
