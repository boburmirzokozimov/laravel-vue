<?php

namespace App\Http\Controllers\Client\MetalAndCrypto;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Inertia\Inertia;

class MetalAndCryptoController extends Controller
{
    public function metal(Client $client)
    {
        dd($client->metals()->with('client')->get());
        return Inertia::render('Clients/Metal/Index', [
            'metals' => $client->metals,
            'metalTransactions' => $client->metalTransactions()
        ]);
    }
}
