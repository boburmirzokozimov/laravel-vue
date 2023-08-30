<?php

namespace App\Http\Controllers\Api\Client\Crypto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\CreateMetalAndCryptoRequestForm;
use App\Models\Client\Client;
use App\Models\Client\Crypto\CryptoRates;
use Illuminate\Http\Request;

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

    public function balance(Request $request)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        return response()->json([
            'data' => $client->cryptoCurrencies()->get(['card_type', 'balance']),
        ]);
    }

    public function buy(CreateMetalAndCryptoRequestForm $requestForm)
    {
        $credentials = $requestForm->validated();
        $credentials['withdraw'] = false;
        $this->manage($requestForm, $credentials);

        return response()->json([
            'message' => "Success",
        ]);
    }

    public function manage(CreateMetalAndCryptoRequestForm $requestForm, array $credentials)
    {
        $client = Client::findByToken($requestForm->bearerToken())->first();
        $credentials['type'] = 2;
        $client->metalAndCryptoCurrencyTransactions()->create($credentials);

        return response()->json([
            'message' => "Success",
        ]);
    }

    public function sell(CreateMetalAndCryptoRequestForm $requestForm)
    {
        $credentials = $requestForm->validated();
        $credentials['withdraw'] = true;
        $this->manage($requestForm, $credentials);

        return response()->json([
            'message' => "Success",
        ]);
    }
}
