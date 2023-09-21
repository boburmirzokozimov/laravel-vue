<?php

namespace App\Http\Controllers\Api\Chat;


use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Client\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function sendByClient(MessageFormRequest $request, Centrifugo $centrifugo)
    {
        $client = Auth::user();

        $message = $client
            ->messages()
            ->create($request->validated());

        $chat_room_id = $request->validated('chat_room_id');

        $centrifugo->publish('fin_help:chat#' . $client->id, [
            'client' => $client,
            'chat_room_id' => $chat_room_id,
            'message' => $message
        ]);

        $message->notifyUsers([
            'type' => 'message',
        ]);

        return response()->json([
            'data' => 'Successfully sent'
        ]);
    }

    public function getToken(Centrifugo $centrifugo, Request $request)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        return response()->json([
            'token' => $centrifugo->generateConnectionToken($client->id)
        ]);
    }
}
