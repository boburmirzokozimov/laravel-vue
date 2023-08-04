<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Create');
    }

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

        return back()->with([
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
            Auth::login($user);
            $user->update([
                'login_code' => null
            ]);
            $request->session()->regenerate();
            return redirect('/users');
        }

        return back()->setStatusCode(401)->withErrors([
            'login_code' => 'The provided credentials do not match our records.',
        ])->onlyInput('login_code');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
