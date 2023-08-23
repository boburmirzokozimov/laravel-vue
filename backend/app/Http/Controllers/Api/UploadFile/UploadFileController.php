<?php

namespace App\Http\Controllers\Api\UploadFile;

use App\Events\MessageSentByClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UploadFile\UploadFileRequestForm;
use App\Models\Client\Client;
use App\Services\UploadService;

class UploadFileController extends Controller
{
    public function __construct(private UploadService $uploadService)
    {
    }

    public function __invoke(UploadFileRequestForm $request)
    {
        $credentials = $request->validated();
        $credentials['message'] = $this->uploadService->uploadMessage($request->validated('message'));
        $client = Client::findByToken($request->bearerToken())->first();

        $message = $client
            ->messages()
            ->create($credentials);

        event(new MessageSentByClient($client, $request->validated('chat_room_id'), $message));

        return response()->json([
            'message' => 'Success',
            'data' => [
                'path' => $credentials['message'],
//                'type' => $credentials['type'],
            ]
        ]);
    }
}
