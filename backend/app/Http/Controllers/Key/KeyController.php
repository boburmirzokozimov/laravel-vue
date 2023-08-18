<?php

namespace App\Http\Controllers\Key;

use App\Http\Controllers\Controller;
use App\Http\Requests\Key\CreateKeyRequestForm;
use App\Models\Keys\Key;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KeyController extends Controller
{
    public function index()
    {
        return Inertia::render('Keys/Index', [
            'keys' => Key::all()
        ]);
    }

    public function store(CreateKeyRequestForm $request)
    {
        Key::query()
            ->create($request->validated());

        return to_route('keys');
    }

    public function create()
    {
        return Inertia::render('Keys/Create');
    }

    public function edit(Key $key)
    {
        return Inertia::render('Keys/Edit', ['key' => $key]);
    }

    public function update(CreateKeyRequestForm $request, Key $key)
    {
        $key->update($request->validated());

        return to_route('keys');
    }

    public function destroy(Key $key)
    {
        $key->delete();

        return to_route('keys');
    }
}
