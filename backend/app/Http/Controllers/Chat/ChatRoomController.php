<?php

namespace App\Http\Controllers\Chat;

use App\Events\ChatRoomCreated;
use App\Http\Controllers\Controller;
use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;

class ChatRoomController extends Controller
{
    public function store(Client $client)
    {
        $chatRoom = ChatRoom::create(['client_id' => $client->id]);

        event(new ChatRoomCreated($chatRoom));

        return response()->json([
            'chat_room_id' => $chatRoom->id
        ]);
    }
}
