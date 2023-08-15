<?php

namespace App\Services;

use App\Models\Client\Client;

class AuthService
{
    public function handleLogin(Client $client): string
    {
        $client->update([
            'auth_key' => ''
        ]);

        $access_token = TokenService::createAccessToken($client);
        $refresh_token = TokenService::createRefreshToken($client);

        $client->update([
            'access_token' => $access_token
        ]);

        $client->storeRefreshToken($refresh_token);

        return $access_token;
    }

    public function findByToken(?string $bearerToken)
    {
        
    }
}
