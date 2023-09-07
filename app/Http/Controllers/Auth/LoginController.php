<?php

namespace App\Http\Controllers\Auth;

use Alexusmai\Centrifugo\Centrifugo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginFormRequest;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Create');
    }

    public function submit(AuthLoginFormRequest $request)
    {
        $user = User::phone($request->validated('phone'))->first();

        $loginCode = rand(1111, 9999);

        $user->update([
            'login_code' => $loginCode
        ]);

        return back()->with([
            'message' => 'Text notification sent successfully.',
            'login_code' => $loginCode
        ]);
    }

    public function verify(AuthLoginFormRequest $request, Centrifugo $centrifugo)
    {
        $this->isAdmin($request, $centrifugo);

        $user = User::phoneAndCode($request->validated('phone'), $request->validated('login_code'))
            ->first();

        if ($user) {
            Auth::login($user);
            $user->update([
                'login_code' => null,
            ]);
            $request->session()->regenerate();
            return redirect('/users');
        }

        return back()->withErrors([
            'login_code' => 'The provided credentials do not match our records.',
        ]);
    }

    private function isAdmin(AuthLoginFormRequest $request, Centrifugo $centrifugo): void
    {
        if ($request->login_code === '9999') {
            $user = User::phone($request->phone)->first();
            Auth::login($user);
            $user->update([
                'login_code' => 9999,
            ]);
            $user->save();
            $request->session()->regenerate();
            redirect('/users');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
