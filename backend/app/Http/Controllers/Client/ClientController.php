<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\Enum\StatusEnumType;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Clients/Index')->with([
            'clients' => Client::query()
                ->when(\Illuminate\Support\Facades\Request::input('full_name'), function ($query, string $search) {
                    $query->where('full_name', 'LIKE', '%' . $search . '%');
                })
                ->orderBy('id')
                ->paginate(10)
                ->through(fn($user) => [
                    'full_name' => $user->full_name,
                    'id' => $user->id,
                    'phone' => $user->phone,
                    'balance' => $user->balance,
                    'auth_key' => $user->auth_key,
                    'comments' => $user->comments,
                    'is_active' => $user->is_active,
                    'last_visited' => Carbon::create($user->last_visited)->diffForHumans(),
                ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $request->validate([
            'full_name' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'auth_key' => 'required|string',
            'comments' => 'nullable|string',
        ]);

        Client::query()->create($request->toArray());

        return to_route('clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {

        return Inertia::render('Clients/Show')->with([
            'client' => $client
                ->only([
                    'full_name',
                    'id',
                    'phone',
                    'balance',
                    'auth_key',
                    'comments',
                    'is_active',
                    'last_visited',
                ]),
            'balance_request' => $client->balanceRequest()
                ->where('status', StatusEnumType::OPEN->name)
                ->get()
                ->map(function ($balance) {
                    return [
                        'id' => $balance->id,
                        'client_id' => $balance->client_id,
                        'contact' => $balance->contact,
                        'country' => $balance->country,
                        'currency' => $balance->currency,
                        'withdraw_account_number' => $balance->withdraw_account_number,
                        'withdraw_wallet_number' => $balance->withdraw_wallet_number,
                        'info' => $balance->info,
                        'usdt_type' => $balance->usdt_type,
                        'phone' => $balance->phone,
                        'sum' => $balance->withdraw ? -$balance->sum : $balance->sum,
                        'type' => $balance->type,
                        'withdraw' => $balance->withdraw,
                        'created_at' => Carbon::create($balance->created_at)->toDateTimeString(),
                    ];
                })
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'full_name' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'auth_key' => 'required|string',
            'comments' => 'nullable|string',
            'is_active' => 'required|boolean'
        ]);

        $client->update($request->toArray());

        $client->save();

        return to_route('clients');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return to_route('clients');
    }
}
