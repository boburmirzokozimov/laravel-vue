<?php

namespace App\Broadcasting;

use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;
use App\Models\User\User;

class ChatChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user, ChatRoom $chatRoom, Client $client): array|bool
    {
        return $chatRoom->client()->is($client);
    }
}
