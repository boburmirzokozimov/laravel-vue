<?php

namespace App\Services;

use App\Repositories\TokenRepository;
use Illuminate\Http\Request;
use ReallySimpleJWT\Token;

class TokenService
{
    public function __construct(private TokenRepository $tokenRepository)
    {
    }

    public function isExpired(?string $bearerToken): bool
    {
        return Token::validateExpiration($bearerToken);
    }

    public function isValid(?string $token): bool
    {
        return Token::validate($token, 'sec!ReT423*&');
    }

    public function refreshToken(Request $request): array
    {
        $token = $this->tokenRepository->findByToken($request->bearerToken());

        $newAccessToken = self::createRefreshToken($token->tokenable);
        $newRefreshToken = self::createAccessToken($token->tokenable);

        $token->tokenable->update([
            'access_token' => $newAccessToken
        ]);

        $token->update([
            'refresh_token' => $newRefreshToken
        ]);

        return [
            'access_token' => $newAccessToken,
            'refresh_token' => $newRefreshToken
        ];
    }

    public static function createRefreshToken($client)
    {
        $secret = 'sec!ReT423*&';
        $expiration = time() + 60 * 60 * 24 * 30;
        $issuer = 'localhost';
        return Token::create($client->id, $secret, $expiration, $issuer);
    }

    public static function createAccessToken($client)
    {
        $secret = 'sec!ReT423*&';
        $expiration = time() + 3600;
        $issuer = 'localhost';
        return Token::create($client->id, $secret, $expiration, $issuer);
    }
}
