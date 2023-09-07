<?php

namespace App\Http\Controllers\Api\Chat;


use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Client\Client;
use GuzzleHttp\Exception\GuzzleException;

class ChatController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function sendByClient(MessageFormRequest $request, Centrifugo $centrifugo)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        $message = $client
            ->messages()
            ->create($request->validated());

        $chat_room_id = $request->validated('chat_room_id');

        $centrifugo->publish('finHelpRooms.' . $chat_room_id, [
            'client' => $client,
            'chat_room_id' => $chat_room_id,
            'message' => $message
        ]);

        return response()->json([
            'data' => 'Successfully sent'
        ]);
    }
}
