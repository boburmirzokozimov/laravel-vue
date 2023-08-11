<?php

namespace App\Broadcasting;

use App\Models\User\User;

class ChatRoomChannel
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
    public function join(User $user): array|bool
    {
        return auth()->check();
    }
}
