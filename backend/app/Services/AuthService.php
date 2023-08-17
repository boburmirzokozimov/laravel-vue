<?php

namespace App\Services;

use App\Models\Client\Client;

class AuthService
{
    public function handleLogin(Client $client): array
    {
        $client->invalidateAuthKey();

        [$access_token, $refresh_token] = TokenService::createTokens($client);

        $client->update([
            'access_token' => $access_token
        ]);

        $client->storeRefreshToken($refresh_token);

        return [
            'access_token' => $access_token,
            'refresh_token' => $refresh_token
        ];
    }
}
