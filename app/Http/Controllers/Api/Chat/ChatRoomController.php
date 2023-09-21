<?php

namespace App\Http\Controllers\Api\Chat;

use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Models\Chat\ChatRoom;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function store(Request $request, Centrifugo $centrifugo)
    {
        $client = Auth::user();
        $chatRoom = $client->chatRoom()->firstOrCreate()->load('client');

        $centrifugo->publish('fin_help:chat', ['chatRoom' => $chatRoom]);

        return response()->json([
            'data' => [
                'message' => 'Successfully created chat room',
                'chat_room_id' => $chatRoom->id
            ]
        ]);
    }

    public function history(ChatRoom $chatRoom)
    {
        $perPage = \Illuminate\Support\Facades\Request::input('per_page');
        return response()->json([
            'messages' => $chatRoom
                ->messages()
                ->simplePaginate($perPage ?? 10)
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
