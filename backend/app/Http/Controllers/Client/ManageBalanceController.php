<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageBalanceRequest;
use App\Models\Client\BalanceRequest;
use App\Models\Client\Client;
use App\Models\Country\Country;
use Exception;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ManageBalanceController extends Controller
{
    public function manage(ManageBalanceRequest $request, Client $client)
    {
        $client->manageBalance($request->validated());

        return to_route('clients.show', ['client' => $client]);
    }

    public function create(Client $client)
    {
        return Inertia::render('Clients/BalanceRequest/CreateBalanceRequest')->with([
            'client' => $client,
            'countries' => Country::all()
        ]);
    }

    public function activate(Client $client, BalanceRequest $balanceRequest)
    {
        try {
            DB::beginTransaction();
            $client->activate($balanceRequest);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'message' => $e->getMessage(),
            ]);
        }

        return back();
    }
}
