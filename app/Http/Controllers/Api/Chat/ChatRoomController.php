<?php

namespace App\Http\Controllers\Api\Chat;

use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Request as BaseRequest;

class ChatRoomController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function store(Request $request, Centrifugo $centrifugo)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        $chatRoom = $client->chatRoom()->firstOrCreate()->load('client');

        $centrifugo->publish('finHelpRooms', ['chatRoom' => $chatRoom]);

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


    public function example(BaseRequest $request, Centrifugo $centrifugo)
    {
        dd($centrifugo->publish('news', ['message' => 'Channel Created']));
        $client = Client::findByToken($request->bearerToken())->first();

        $token = $centrifugo->generatePrivateChannelToken((string)$client->id, 'channel', time() + 5 * 60, [
            'name' => $client->full_name,
        ]);

        return response()->json([
            'token' => $token,
        ]);
        //eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxIiwiaW5mbyI6eyJuYW1lIjoiSGFycnkgUG90dGVyIn19.Dep1ey3sI5hQUOjvxwnQPQ0iY8fLas-297d5s-knRNw
        //eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjaGFubmVsIjoiY2hhbm5lbCIsInN1YiI6IjEiLCJpbmZvIjp7Im5hbWUiOiJIYXJyeSBQb3R0ZXIifSwiZXhwIjoxNjk0MDY0NDcxfQ.tKHpgTf1MsKhURc2_JVkN8I4CLKcldQKZW8Xh8fV7w0
    }
}
