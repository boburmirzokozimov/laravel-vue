<?php

namespace App\Repositories;

use App\Models\RefreshToken\RefreshToken;

class TokenRepository
{
    public function findByToken(string $token)
    {
        return RefreshToken::with('tokenable')
            ->where('refresh_token', $token)
            ->first();
    }
}
