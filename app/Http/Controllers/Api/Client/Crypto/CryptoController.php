<?php

namespace App\Http\Controllers\Api\Client\Crypto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\CreateMetalAndCryptoRequestForm;
use App\Http\Resources\Crypto\CryptoResource;
use App\Models\Client\Crypto\CryptoCurrency;
use App\Models\Client\Crypto\CryptoRates;
use App\Models\Client\MetalAndCryptoCurrencyTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $client = Auth::user();

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
        $client = Auth::user();
        $credentials['type'] = 2;

        if ($credentials['withdraw'] === true) {
            $metalBalance = CryptoCurrency::findByClientId($client, $credentials['sort'])->first();
            $metalBalance->subtractionFromBalance($credentials['quantity']);
        }

        $client->metalAndCryptoCurrencyTransactions()->create($credentials);

        $client->notifyUser([
            'type' => 'crypto transaction',
        ]);

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

    public function history(Request $request)
    {
        $client = Auth::user();

        return response()->json([
            CryptoResource::collection(MetalAndCryptoCurrencyTransaction::cryptoTransactions($client)->paginate())->response()->getData(true)
        ]);
    }
}
