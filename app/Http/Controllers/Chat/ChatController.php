<?php

namespace App\Http\Controllers\Chat;

use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;
use App\Services\OneSignalService;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function __construct(private readonly OneSignalService $oneSignalService)
    {
    }

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

    public function update(ChatRoom $chatRoom): RedirectResponse
    {
        $chatRoom->toggleCompletion();

        return back();
    }

    /**
     * @throws GuzzleException
     */
    public function sendMessage(\Illuminate\Http\Request $request, Client $client, Centrifugo $centrifugo): RedirectResponse
    {
        $chatRoom = $client->chatRoom()->firstOrCreate()->load('client');

        $centrifugo->publish('fin_help:chat', ['chatRoom' => $chatRoom]);

        $message = $request->user()
            ->messages()
            ->create([
                'message' => $request->message,
                'chat_room_id' => $chatRoom->id
            ]);

        $centrifugo->publish('fin_help:chat#' . $client->id, [
            'client' => $client,
            'chat_room_id' => $chatRoom->id,
            'message' => $message
        ]);

        $contents = [
            "ru" => 'У вас новое сообщение в чате.',
            'en' => 'You have got a new message.'
        ];

        $this->oneSignalService->send($client, 'chat', $contents);

        return back();
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

        $contents = [
            "ru" => 'У вас новое сообщение в чате.',
            'en' => 'You have got a new message.'
        ];
        $this->oneSignalService->send($client, 'chat', $contents);

        return back();
    }

    public function getToken(Centrifugo $centrifugo)
    {
        return response()->json([
            'token' => $centrifugo->generateConnectionToken(Auth::id())
        ]);
    }
}
