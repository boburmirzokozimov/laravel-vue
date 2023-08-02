<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Users/Index')->with([
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
                    'is_banned' => $user->is_banned,
                    'last_visited' => Carbon::create($user->last_visited)->diffForHumans(),
                    'role' => $user->role()
                ]),
            'countries' => Country::all(),
            'roles' => Role::all(),
            'can' => [
                'create_user' => Auth::user()->role->hasPermissionTo('create'),
                'edit_user' => Auth::user()->role->hasPermissionTo('edit')
            ]
        ]);
    }

    public function create()
    {
        $this->authorize('create', \request()->user());
        
        return Inertia::render('Users/Create')->with([
            'countries' => Country::all('id', 'name'),
            'roles' => Role::all(),
            'can' => [
                'create_user' => Auth::user()->role->hasPermissionTo('create'),
            ]
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
            'country' => 'required|string',
            'role_id' => 'int|exists:roles,id'
        ]);

        User::query()->create($request->toArray());

        return to_route('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'string|required',
            'phone' => 'required|numeric|min:10',
            'country' => 'required|string',
            'is_active' => 'boolean',
            'is_banned' => 'boolean'
        ]);

        $user->update($request->toArray());

        return to_route('users')->with([
            'message' => 'Successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();

        return to_route('users')->with([
            'message' => 'Successfully removed'
        ]);
    }

    public function ban(User $user)
    {
        $user->is_banned = true;
        $user->save();
        return back()->with([
            'message' => 'Successfully banned'
        ]);
    }
}
