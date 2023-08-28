<?php

namespace App\Http\Controllers\Api\Chat;

use App\Events\ChatRoomCreated;
use App\Http\Controllers\Controller;
use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function store(Request $request)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        $chatRoom = ChatRoom::firstOrCreate(['client_id' => $client->id])->with('client')->first();

        event(new ChatRoomCreated($chatRoom));

        return response()->json([
            'data' => [
                'message' => 'Successfully sent',
                'chat_room_id' => $chatRoom->id
            ]
        ]);
    }

    public function history(ChatRoom $chatRoom)
    {
        return response()->json([
            'messages' => $chatRoom
                ->messages()
                ->simplePaginate(10)
                ->through(function ($chat) {
                    return [
                        'message' => $chat->message,
                        'messageble_type' => $chat->messageble_type,
                        'type' => $chat->type,
                        'created_at' => $chat->created_at,
                    ];
                })
        ]);
    }
}
