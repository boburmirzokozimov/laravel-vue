<?php

namespace App\Http\Controllers\Client\Balance;

use App\Http\Controllers\Controller;
use App\Repositories\MetalAndCryptoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MetalAndCryptoController extends Controller
{
    public function __construct(private MetalAndCryptoService $service)
    {
    }

    public function metal(Request $request)
    {
        $response = Http::withHeaders([
            'X-API-KEY' => '6f4f022b8628f652bc9e99eea95be136'
        ])
            ->get('https://api.metalpriceapi.com/v1/latest?base=USD&currencies=XPT,XAU,XAG')
            ->body();
        $response = json_decode($response, true);

        if ($response['success']) {
            $this->service->handleMetal($response);
        }
    }
}
