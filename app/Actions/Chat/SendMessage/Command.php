<?php

namespace App\Actions\Chat\SendMessage;

use App\Models\Client\Client;
use App\Models\User\User;

class Command
{
    public function __construct(public string $message,
                                public int    $chatRoom,
                                public User   $user,
                                public Client $client)
    {
    }

    public static function make(array $validated, User $user, Client $client): static
    {
        ['message' => $message, 'chat_room_id' => $chat_room_id] = $validated;
        return new static(
            $message,
            $chat_room_id,
            $user,
            $client
        );
    }

    public function data(): array
    {
        return [
            'message' => $this->message,
            'chat_room_id' => $this->chatRoom
        ];
    }
}
