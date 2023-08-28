<?php

namespace App\Http\Controllers\Client\Balance;

use App\Http\Controllers\Controller;
use Http;
use Illuminate\Http\Request;

class MetalAndCryptoController extends Controller
{
    public function metal(Request $request)
    {
        $response = Http::withHeaders([
            'X-API-KEY' => '6f4f022b8628f652bc9e99eea95be136'
        ])
            ->get('https://api.metalpriceapi.com/v1/latest?base=USD&currencies=EUR,XAU,XAG')
            ->body();
        $response = json_decode($response, true);

        dd($response);
        if ($response['success']) {

        }
    }
}
