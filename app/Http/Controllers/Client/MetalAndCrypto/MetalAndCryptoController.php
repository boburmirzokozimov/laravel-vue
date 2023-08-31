<?php

namespace App\Http\Controllers\Client\MetalAndCrypto;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\Client\Metal\Metal;
use App\Models\Client\MetalAndCryptoCurrencyTransaction;
use App\Models\Enum\TransactionStatusEnumType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Throwable;

class MetalAndCryptoController extends Controller
{
    public function metal(Client $client)
    {
        return Inertia::render('Clients/Metal/Index', [
            'metals' => Metal::findByClientId($client),
            'metalTransactions' => $client->metalTransactions()
        ]);
    }

    public function activate(Request $request, int $client, MetalAndCryptoCurrencyTransaction $transaction)
    {
        $client = Client::where('id', $client)->first();
        $sum = $request->sum;

        if ($transaction->withdraw) {
            try {
                DB::beginTransaction();
                $client->subtractionFromBalance($sum);
                $metal = Metal::findByClientId($client, $transaction->sort)->first();
                $metal->addToBalance($sum);
                $transaction->update([
                    'status' => TransactionStatusEnumType::SUCCESS->name,
                    'sum' => $sum,
                ]);
                DB::commit();
            } catch (Throwable $e) {
                DB::rollBack();
                $transaction->update(['status' => TransactionStatusEnumType::FAILED->name]);
                return back()->withErrors([
                    'message' => $e->getMessage(),
                ]);
            }
        } else {
            try {
                //TODO:IM HERE
                DB::beginTransaction();
                $client->addToBalance($sum);
                $metal = Metal::findByClientId($client, $transaction->sort)->first();
                $metal->subtractionFromBalance($sum);
                $transaction->update([
                    'status' => TransactionStatusEnumType::SUCCESS->name,
                    'sum' => $sum,
                ]);
                DB::commit();
            } catch (Throwable $e) {
                DB::rollBack();
                $transaction->update(['status' => TransactionStatusEnumType::FAILED->name]);
                return back()->withErrors([
                    'message' => $e->getMessage(),
                ]);
            }
        }

        return to_route('metals.balance', ['client' => $client->id]);
    }
}
