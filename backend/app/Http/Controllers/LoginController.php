<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|min:10',
        ]);

        $user = User::firstOrCreate($request->toArray());

        if (!$user) {
            return response()->json(['message' => 'Could not process a user with that phone number'], 401);
        }

        $loginCode = rand(1111, 9999);

        $user->update([
            'login_code' => $loginCode
        ]);

        return response()->json([
            'message' => 'Text notification sent successfully.',
            'login_code' => $loginCode
        ]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|min:10',
            'login_code' => 'required|numeric|between:1111,9999'
        ]);

        $user = User::query()
            ->where('phone', $request->phone)
            ->where('login_code', $request->login_code)
            ->first();

        if ($user) {
            $user->update([
                'login_code' => null
            ]);
            return $user->createToken($request->login_code)->plainTextToken;
        }

        return response()->json([
            'message' => 'Invalid verification code.',
        ], 401);
    }
}
