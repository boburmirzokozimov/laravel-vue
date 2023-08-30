<?php

namespace App\Http\Controllers\Api\Client\Crypto;

use App\Http\Controllers\Controller;
use App\Models\Client\Crypto\CryptoRates;

class CryptoController extends Controller
{
    public function index()
    {
        $btc = CryptoRates::query()->latest()->where('type', "BTC")->first();
        $eth = CryptoRates::query()->latest()->where('type', "ETH")->first();
        $bnb = CryptoRates::query()->latest()->where('type', "BNB")->first();
        $ada = CryptoRates::query()->latest()->where('type', "ADA")->first();
        $dot = CryptoRates::query()->latest()->where('type', "DOT")->first();

        return response()->json([
            'data' => [
                'btc' => $btc,
                'eth' => $eth,
                'bnb' => $bnb,
                'ada' => $ada,
                'dot' => $dot,
            ]
        ]);
    }
}
