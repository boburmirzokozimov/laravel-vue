<?php

namespace App\Http\Controllers\Chat;

use App\Events\MessageSent;
use App\Events\MessageSentByClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index()
    {
        return Inertia::render('Chats/Index')->with([
            'chat_rooms' => ChatRoom::with(['messages', 'client'])
                ->get()
        ]);
    }

    public function show(ChatRoom $chatRoom)
    {
        return Inertia::render('Chats/Messages')->with([
            'chat_room' => $chatRoom->load('messages')
        ]);
    }

    public function send(MessageFormRequest $request)
    {
        $message = $request->user()
            ->messages()
            ->create($request->validated());

        event(new MessageSent($request->user(), $message));

        return back();
    }

    public function sendByClient(MessageFormRequest $request, Client $client)
    {
        $message = $client
            ->messages()
            ->create($request->validated());

        event(new MessageSentByClient($client, $request->validated('chat_room_id'), $message));

        return back();
    }
}
