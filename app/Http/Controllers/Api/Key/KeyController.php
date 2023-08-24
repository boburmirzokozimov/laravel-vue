<?php

namespace App\Http\Controllers\Api\Key;

use App\Http\Controllers\Controller;
use App\Models\Keys\Key;

class KeyController extends Controller
{
    public function index()
    {
        $keys = Key::all()->last();
        return response()->json([
            'data' => [
                'id' => $keys->id,
                'account_number' => [
                    'sepa' => $keys->account_number_sepa,
                    'swift' => $keys->account_number_swift,
                ],
                'wallet_number' => [
                    'erc' => $keys->wallet_number_erc,
                    'trc' => $keys->wallet_number_trc,
                ]
            ]
        ]);
    }
}
