<?php

namespace App\Http\Controllers\Api\Client\Metal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\CreateMetalAndCryptoRequestForm;
use App\Models\Client\Client;
use App\Models\Client\Metal\Metal;
use App\Models\Client\Metal\MetalRates;
use Illuminate\Http\Request;

class MetalController extends Controller
{
    public function index()
    {
        $xau = MetalRates::query()->latest()->where('type', "XAU")->first();
        $xag = MetalRates::query()->latest()->where('type', "XAG")->first();
        $xpt = MetalRates::query()->latest()->where('type', "XPT")->first();

        return response()->json([
            'data' => [
                'xag' => $xag,
                'xau' => $xau,
                'xpt' => $xpt,
            ]
        ]);
    }

    public function balance(Request $request)
    {
        $client = Client::findByToken($request->bearerToken())->first();

        return response()->json([
            'data' => $client->metals()->get(['card_type', 'balance']),
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
        $credentials['type'] = 1;

        if ($credentials['withdraw'] === true) {
            $metalBalance = Metal::findByClientId($client, $credentials['sort'])->first();
            $metalBalance->subtractionFromBalance($credentials['quantity']);
        }

        $client->metalAndCryptoCurrencyTransactions()->create($credentials);
        $client->notifyUser([
            'type' => 'metal transaction',
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
}
