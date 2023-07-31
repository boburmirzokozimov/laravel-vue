<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'users' => User::query()
                ->when(\Illuminate\Support\Facades\Request::input('full_name'), function ($query, string $search) {
                    $query->where('full_name', 'LIKE', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10)
                ->through(fn($user) => [
                    'full_name' => $user->full_name,
                    'id' => $user->id,
                    'country' => $user->country,
                    'phone' => $user->phone,
                    'is_active' => $user->is_active,
                    'is_banned' => $user->is_banned
                ]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'string|required',
            'phone' => 'required|numeric|min:10',
            'country' => 'required|string'
        ]);

        User::query()->create($request->toArray());

        return response()->json([], 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'string|required',
            'phone' => 'required|numeric|min:10',
            'country' => 'required|string',
            'is_active' => 'required|boolean',
            'is_banned' => 'required|boolean'
        ]);

        $user->update($request->toArray());

        return response()->json([], 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();

        return response()->json();
    }
}
