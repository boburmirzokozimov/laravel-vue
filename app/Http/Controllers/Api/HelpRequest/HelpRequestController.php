<?php

namespace App\Http\Controllers\Api\HelpRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpRequestCreateForm;
use App\Models\HelpRequest\HelpRequest;
use Illuminate\Http\JsonResponse;

class HelpRequestController extends Controller
{
    public function store(HelpRequestCreateForm $request): JsonResponse
    {
        $credentials = $request->validated();

        HelpRequest::query()->create($credentials);

        return response()->json([
            'data' => 'Successfully created',
        ]);
    }
}
