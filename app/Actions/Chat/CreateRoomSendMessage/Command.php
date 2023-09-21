<?php

namespace App\Actions\Chat\CreateRoomSendMessage;

use App\Models\Client\Client;
use App\Models\User\User;

class Command
{
    public function __construct(public readonly string $message,
                                public readonly User   $user,
                                public readonly Client $client)
    {
    }

    public static function make(string $message, User $user, Client $client): static
    {
        return new static($message, $user, $client);
    }
}
