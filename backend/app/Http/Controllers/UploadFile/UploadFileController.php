<?php

namespace App\Http\Controllers\UploadFile;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UploadFile\UploadFileRequestForm;
use App\Services\UploadService;
use Auth;

class UploadFileController extends Controller
{
    public function __construct(private UploadService $uploadService)
    {
    }

    public function __invoke(UploadFileRequestForm $request)
    {
        $credentials = $request->validated();
        $credentials['message'] = $this->uploadService->uploadMessage($request->validated('message'));
        $client = Auth::user();

        $message = $client
            ->messages()
            ->create($credentials);

        event(new MessageSent($client, $message));

        return back();
    }
}
