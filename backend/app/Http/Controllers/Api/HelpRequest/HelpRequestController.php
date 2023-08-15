<?php

namespace App\Http\Controllers\Api\HelpRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpRequestCreateForm;
use App\Models\HelpRequest\HelpRequest;

class HelpRequestController extends Controller
{
    public function store(HelpRequestCreateForm $request)
    {
        $credentials = $request->validated();

        HelpRequest::query()->create($credentials);

        return response()->json([
            'data' => 'Successfully created',
        ]);
    }
}
