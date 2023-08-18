<?php

namespace App\Http\Controllers\Api\Balance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Balance\CreateBalanceReplenishForm;
use App\Models\Client\Client;
use Illuminate\Http\Request;

class BalanceReplenishController extends Controller
{
    //        {
//                  "type":"CASH",
//                  "country":"UZBEKISTAN",
//                  "currency":"USD",
//                  "contact":"Boburmirzo",
//                  "sum":12345,
//                  "phone":998900223123,
//                  "withdraw":false,
//                  "form":"DELIVERY"
//             }
    public function manage(CreateBalanceReplenishForm $request)
    {
        $credentials = $request->validated();

        $client = Client::findByToken($request->bearerToken())->first();

        $client->manageBalance($credentials);

        return response()->json([
            'data' => 'Success',
        ]);
    }
}
