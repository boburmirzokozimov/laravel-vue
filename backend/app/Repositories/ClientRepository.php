<?php

namespace App\Repositories;

use App\Models\Client\Client;

class ClientRepository
{
    public function findByToken(?string $token): ?Client
    {
        return Client::with('creditCard')
            ->where('access_token', $token)
            ->first();
    }
}
