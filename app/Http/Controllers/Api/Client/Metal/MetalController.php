<?php

namespace App\Http\Controllers\Api\Client\Metal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\CreateMetalAndCryptoRequestForm;
use App\Http\Resources\Metal\CryptoResource;
use App\Http\Resources\Metal\MetalResource;
use App\Models\Client\Metal\Metal;
use App\Models\Client\Metal\MetalRates;
use App\Models\Client\MetalAndCryptoCurrencyTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $client = Auth::user();

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
        $client = Auth::user();
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

    public function history(Request $request)
    {
        $client = Auth::user();
        return response()->json([
            MetalResource::collection(MetalAndCryptoCurrencyTransaction::metalTransactions($client)->paginate())->response()->getData(true)
        ]);
    }
}
