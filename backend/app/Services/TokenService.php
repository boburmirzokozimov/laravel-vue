<?php

namespace App\Services;

use App\Models\Client\Client;
use App\Repositories\TokenRepository;
use Config;
use Illuminate\Http\Request;
use ReallySimpleJWT\Token;
use function Laravel\Prompts\search;

class TokenService
{
    private string $secret;

    public function __construct(private TokenRepository $tokenRepository)
    {
        $this->secret = config('token.token_secret');
    }

    public function isValid(?string $token): bool
    {
        return Token::validate($token, $this->secret);
    }

    public function refreshTokens(Request $request)
    {
        $token = $this->tokenRepository->findByToken($request->refresh_token);

        if (!$token->tokenable->validateByToken($request->uuid)) {
            return response()->json([
                'message' => 'Invalid uuid provided'
            ], 403);
        }

        [$newAccessToken, $newRefreshToken] = self::createTokens($token->tokenable);

        $token->tokenable->update([
            'access_token' => $newAccessToken
        ]);

        $token->update([
            'refresh_token' => $newRefreshToken
        ]);

        return response()->json([
            'access_token' => $newAccessToken,
            'refresh_token' => $newRefreshToken
        ]);
    }

    public static function createTokens($client): array
    {
        return [self::createAccessToken($client), self::createRefreshToken($client)];
    }

    public static function createAccessToken($client)
    {
        return Token::create(
            $client->id,
            config('token.token_secret'),
            time() + config('token.token_access_expiration'),
            config('token.token_issuer')
        );
    }

    public static function createRefreshToken($client)
    {
        return Token::create(
            $client->id,
            config('token.token_secret'),
            time() + config('token.token_refresh_expiration'),
            config('token.token_issuer')
        );
    }

    public function isExpired(?string $bearerToken): bool
    {
        return Token::validateExpiration($bearerToken);
    }
}
