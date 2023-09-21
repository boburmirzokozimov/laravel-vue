<?php

namespace App\Http\Controllers\Chat;

use Alexusmai\Centrifugo\Centrifugo;
use App\Actions\Chat;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
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

    public function update(ChatRoom $chatRoom): RedirectResponse
    {
        $chatRoom->toggleCompletion();

        return back();
    }

    /**
     * @throws GuzzleException
     */
    public function sendMessage(HttpRequest $request, Client $client, Chat\CreateRoomSendMessage\Action $action): RedirectResponse
    {
        $command = Chat\CreateRoomSendMessage\Command::make($request->message, $request->user(), $client);
        $action->handle($command);
        return back();
    }

    /**
     * @throws GuzzleException
     */
    public function send(MessageFormRequest $request, Client $client, Chat\SendMessage\Action $action): RedirectResponse
    {
        $command = Chat\SendMessage\Command::make($request->validated(), $request->user(), $client);
        $action->handle($command);
        return back();
    }

    public function getToken(Centrifugo $centrifugo)
    {
        return response()->json([
            'token' => $centrifugo->generateConnectionToken(Auth::id())
        ]);
    }
}
