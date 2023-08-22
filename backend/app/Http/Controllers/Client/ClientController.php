<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\Enum\CreditCardStatusEnumType;
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
                ->when(\Illuminate\Support\Facades\Request::input('phone'), function ($query, string $search) {
                    $query->where('phone', 'LIKE', '%' . $search . '%');
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
            'filters' => \Illuminate\Support\Facades\Request::all(),

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
                }),
            'transaction_statuses' => [
                StatusEnumType::SUCCESS->name => StatusEnumType::SUCCESS->name,
                StatusEnumType::HOLD->name => StatusEnumType::HOLD->name,
                StatusEnumType::CANCELED->name => StatusEnumType::CANCELED->name,
                StatusEnumType::WAITING->name => StatusEnumType::WAITING->name,
                StatusEnumType::VERIFICATION->name => StatusEnumType::VERIFICATION->name,
            ],
            'credit_card_requests' => $client->creditCardRequest()
                ->where('status', CreditCardStatusEnumType::PENDING->name)
                ->where('anonymous', false)
                ->get()
                ->map(function ($cardRequest) {
                    return [
                        'id' => $cardRequest->id,
                        'client_id' => $cardRequest->client_id,
                        'name' => $cardRequest->name,
                        'surname' => $cardRequest->surname,
                        'middle_name' => $cardRequest->middle_name,
                        'phone' => $cardRequest->phone,
                        'birth_date' => Carbon::create($cardRequest->birth_date)->format('Y-m-d'),
                        'scan_passport' => $cardRequest->scan_passport,
                        'selfie_passport' => $cardRequest->selfie_passport,
                        'created_at' => Carbon::create($cardRequest->created_at)->format('Y-m-d'),
                        'anonymous' => $cardRequest->anonymous,
                        'anonymous_name' => $cardRequest->anonymous_name,
                        'anonymous_surname' => $cardRequest->anonymous_surname,
                    ];
                }),
            'credit_card_requests_anonymous' => $client->creditCardRequest()
                ->where('status', CreditCardStatusEnumType::PENDING->name)
                ->where('anonymous', true)
                ->get()
                ->map(function ($cardRequest) {
                    return [
                        'id' => $cardRequest->id,
                        'client_id' => $cardRequest->client_id,
                        'anonymous' => $cardRequest->anonymous,
                        'anonymous_name' => $cardRequest->anonymous_name,
                        'anonymous_surname' => $cardRequest->anonymous_surname,
                        'created_at' => Carbon::create($cardRequest->created_at)->format('Y-m-d'),
                    ];
                }),
            'credit_cards' => $client->creditCard()
                ->get()
                ->map(function ($credit_card) {
                    return [
                        'id' => $credit_card->id,
                        'client_id' => $credit_card->client_id,
                        'credit_card_request_id' => $credit_card->credit_card_request_id,
                        'balance' => $credit_card->balance,
                        'owner_name' => $credit_card->owner_name(),
                        'card_number' => $credit_card->card_number,
                        'expire_date' => $credit_card->expire_date,
                    ];
                }),
            'credit_card_transactions' => $client->cardTransactions()
                ->get()
                ->map(function ($credit_card_transactions) {
                    return [
                        'id' => $credit_card_transactions->id,
                        'client_id' => $credit_card_transactions->client_id,
                        'status' => $credit_card_transactions->status,
                        'credit_card_id' => $credit_card_transactions->credit_card_id,
                        'sum' => $credit_card_transactions->withdraw ? -$credit_card_transactions->sum : $credit_card_transactions->sum,
                        'invoice_file' => $credit_card_transactions->invoice_file,
                        'card_number' => $credit_card_transactions->creditCard->card_number,
                        'withdraw' => $credit_card_transactions->withdraw,
                        'created_at' => Carbon::create($credit_card_transactions->created_at)->format('Y-m-d'),
                    ];
                }),
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
