<?php

namespace App\Http\Controllers\Api\Chat;


use App\Events\MessageSentByClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use App\Models\Client\Client;
use OpenApi\Annotations as OA;

class ChatController extends Controller
{
    /**
     * @OA\Post(
     * path="/chat",
     * operationId="Chat",
     * tags={"Chat"},
     * security={{"api_key_security_example":{}}},
     * summary="To send a message,first of you need to create a chat room",
     * description="To send a message in a chat room",
     *     @OA\RequestBody(
     *           @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(
     *                   @OA\Property(
     *                        type="object",
     *                        @OA\Property(
     *                            property="message",
     *                            type="string"
     *                        ),
     *                        @OA\Property(
     *                            property="chat_room_id",
     *                            type="string"
     *                        ),
     *                   ),
     *                   example={
     *                       "message":"Hello",
     *                       "chat_room_id":"1",
     *                  }
     *               )
     *           )
     *  ),
     * @OA\Response(
     * response=200, description="Success",
     * )
     * )
     */
    public function sendByClient(MessageFormRequest $request)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        $message = $client
            ->messages()
            ->create($request->validated());

        event(new MessageSentByClient($client, $request->validated('chat_room_id'), $message));

        return response()->json([
            'data' => 'Successfully sent'
        ]);
    }
}
