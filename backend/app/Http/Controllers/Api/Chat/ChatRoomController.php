<?php

namespace App\Http\Controllers\Api\Chat;

use App\Events\ChatRoomCreated;
use App\Http\Controllers\Controller;
use App\Models\Chat\ChatRoom;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class ChatRoomController extends Controller
{
    /**
     * @OA\Post(
     * path="/chat-room",
     * operationId="ChatRoom",
     * tags={"Chat"},
     * security={{"api_key_security_example":{}}},
     * summary="Createing Chat Room",
     * description="To create a chat room",
     * @OA\Response(
     * response=200, description="Success",
     * @OA\JsonContent(
     * @OA\Property(property="data", type="array",
     *     @OA\Items(
     *         @OA\Property(property="message", type="string"),
     *         @OA\Property(property="chat_room_id", type="string"),
     *     ))
     * )
     * )
     * )
     */
    public function store(Request $request)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        $chatRoom = ChatRoom::create(['client_id' => $client->id])->with('client')->first();

        event(new ChatRoomCreated($chatRoom));

        return response()->json([
            'data' => [
                'message' => 'Successfully sent',
                'chat_room_id' => $chatRoom->id
            ]
        ]);
    }
}
