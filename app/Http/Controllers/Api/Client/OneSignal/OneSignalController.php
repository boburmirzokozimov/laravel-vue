<?php

namespace App\Http\Controllers\Api\Client\OneSignal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OneSignalController extends Controller
{
    public function setToken(Request $request)
    {
        $one_signal_token = $request->validate([
            'one_signal_token' => 'string|required'
        ]);

        $client = Auth::user();

        $client->update($one_signal_token);

        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function removeToken(Request $request)
    {
        $client = Auth::user();

        $client->update([
            'one_signal_token' => ''
        ]);

        return response()->json([
            'message' => 'Success'
        ]);
    }
}
