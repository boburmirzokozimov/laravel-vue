<?php

namespace App\Http\Controllers\Api\Client\Metal;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
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
}
