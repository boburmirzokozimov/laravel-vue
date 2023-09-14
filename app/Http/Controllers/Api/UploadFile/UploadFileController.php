<?php

namespace App\Http\Controllers\Api\UploadFile;

use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UploadFile\UploadFileRequestForm;
use App\Models\Client\Client;
use App\Services\UploadService;
use GuzzleHttp\Exception\GuzzleException;

class UploadFileController extends Controller
{
    public function __construct(private UploadService $uploadService)
    {
    }

    /**
     * @throws GuzzleException
     */
    public function __invoke(UploadFileRequestForm $request, Centrifugo $centrifugo)
    {
        $credentials = $request->validated();
        dd($credentials['message']);
        $credentials['message'] = $this->uploadService->uploadMessage($request->validated('message'));
        $client = Client::findByToken($request->bearerToken())->first();

        $message = $client
            ->messages()
            ->create($credentials);

        $chat_room_id = $request->validated('chat_room_id');

        $centrifugo->publish('fin_help:chat#.' . $client->id, [
            'client' => $client,
            'chat_room_id' => $chat_room_id,
            'message' => $message
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => [
                'path' => $credentials['message'],
//                'type' => $credentials['type'],
            ]
        ]);
    }
}
