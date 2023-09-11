<?php

namespace App\Http\Controllers\Api\Client\OneSignal;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;

class OneSignalController extends Controller
{
    public function setToken(Request $request)
    {
        $one_signal_token = $request->validate([
            'one_signal_token' => 'string|required'
        ]);

        $client = Client::findByToken($request->bearerToken())->first();

        $client->update($one_signal_token);

        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function removeToken(Request $request)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        $client->update([
            'one_signal_token' => ''
        ]);

        return response()->json([
            'message' => 'Success'
        ]);
    }
}
