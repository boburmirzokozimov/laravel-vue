<?php

namespace App\Http\Controllers\UploadFile;

use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UploadFile\UploadFileRequestForm;
use App\Services\OneSignalService;
use App\Services\UploadService;
use Auth;
use GuzzleHttp\Exception\GuzzleException;

class UploadFileController extends Controller
{
    public function __construct(private UploadService $uploadService)
    {
    }

    /**
     * @throws GuzzleException
     */
    public function __invoke(UploadFileRequestForm $request, Centrifugo $centrifugo, OneSignalService $oneSignalService)
    {
        $credentials = $request->validated();
        $credentials['message'] = $this->uploadService->uploadMessage($request->validated('message'));
        $client = Auth::user();

        $message = $client
            ->messages()
            ->create($credentials);

        $chat_room_id = $request->validated('chat_room_id');

        $centrifugo->publish('fin_help:chat#' . $message->chatRoom->client->id, [
            'client' => $client,
            'chat_room_id' => $chat_room_id,
            'message' => $message
        ]);
        $content = [
            'ru' => 'У вас новое сообщение в чате. ',
            'en' => 'You have got a new message.'
        ];
        $oneSignalService->send($message->chatRoom->client, 'chat', $content);
        return back();
    }
}
