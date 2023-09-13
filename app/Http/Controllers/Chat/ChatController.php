<?php

namespace App\Http\Controllers\Chat;

use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index()
    {
        return Inertia::render('Chats/Index')->with([
            'chat_rooms' => ChatRoom::with(['messages', 'client'])
                ->when(Request::input('completed'), function ($query, string $search) {
                    $query->where('completed', $search);
                })
                ->get()
        ]);
    }

    public function show(ChatRoom $chatRoom)
    {
        return Inertia::render('Chats/Messages')->with([
            'chat_room' => $chatRoom->load('messages')
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function send(MessageFormRequest $request, Client $client, Centrifugo $centrifugo): RedirectResponse
    {
        $message = $request->user()
            ->messages()
            ->create($request->validated());

        $chat_room_id = $request->validated('chat_room_id');

        $centrifugo->publish('fin_help:chat#' . $client->id, [
            'client' => $client,
            'chat_room_id' => $chat_room_id,
            'message' => $message
        ]);

        return back();
    }

    public function update(ChatRoom $chatRoom): RedirectResponse
    {
        $chatRoom->toggleCompletion();

        return back();
    }

    public function getToken(Centrifugo $centrifugo)
    {
        return response()->json([
            'token' => $centrifugo->generateConnectionToken(Auth::id())
        ]);
    }
}
