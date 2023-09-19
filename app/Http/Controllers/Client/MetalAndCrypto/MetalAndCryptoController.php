<?php

namespace App\Http\Controllers\Client\MetalAndCrypto;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\Client\Crypto\CryptoCurrency;
use App\Models\Client\Metal\Metal;
use App\Models\Client\MetalAndCryptoCurrencyTransaction;
use App\Models\Enum\TransactionStatusEnumType;
use App\Services\OneSignalService;
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
            'metalTransactions' => $client->metalTransactions(),
            'client' => $client
        ]);
    }

    public function activate(Request $request, int $client, MetalAndCryptoCurrencyTransaction $transaction, OneSignalService $oneSignalService)
    {
        $client = Client::where('id', $client)->first();
        $sum = $request->sum;

        if ($transaction->withdraw) {
            try {
                DB::beginTransaction();
                $client->addToBalance($sum);
                $transaction->balanceRequest()->create([
                    'sum' => $sum,
                    'withdraw' => false,
                    'status' => TransactionStatusEnumType::SUCCESS,
                    'client_id' => $client->id
                ]);
                $metal = Metal::findByClientId($client, $transaction->sort)->first();
                $metal->subtractionFromBalance($transaction->quantity);
                $transaction->update([
                    'status' => TransactionStatusEnumType::SUCCESS->name,
                    'sum' => $sum,
                ]);
                $contents = [
                    "ru" => 'Ваша заявка на продажу метала одобрена. ',
                    'en' => 'Your request to buy metal has been approved.'
                ];
                $oneSignalService->send($client, 'chat', $contents);
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
                DB::beginTransaction();
                $client->subtractionFromBalance($sum);
                $transaction->balanceRequest()->create([
                    'sum' => $sum,
                    'withdraw' => true,
                    'status' => TransactionStatusEnumType::SUCCESS,
                    'client_id' => $client->id
                ]);
                $metal = Metal::findByClientId($client, $transaction->sort)->first();
                $metal->addToBalance($transaction->quantity);
                $transaction->update([
                    'status' => TransactionStatusEnumType::SUCCESS->name,
                    'sum' => $sum,
                ]);
                $contents = [
                    "ru" => 'Ваша заявка на покупку метала одобрена. ',
                    'en' => 'Your request to buy metal has been approved.'
                ];
                $oneSignalService->send($client, 'chat', $contents);
                DB::commit();
            } catch (Throwable $e) {
                DB::rollBack();
                $transaction->update(['status' => TransactionStatusEnumType::FAILED->name]);
                return back()->withErrors([
                    'message' => $e->getMessage(),
                ]);
            }
        }

        return back();
    }

    public function crypto(Client $client)
    {
        return Inertia::render('Clients/Crypto/Index', [
            'metals' => CryptoCurrency::findByClientId($client),
            'metalTransactions' => $client->cryptoTransactions(),
            'client' => $client
        ]);
    }

    public function cancelCrypto(Request $request, Client $client, MetalAndCryptoCurrencyTransaction $transaction, OneSignalService $oneSignalService)
    {
        $crypto = CryptoCurrency::findByClientId($client, $transaction->sort)->first();
        $crypto->addToBalance($transaction->quantity);
        $crypto->addToBalance($transaction->quantity);
        $contents = [
            "ru" => 'Ваша заявка на покупку криптовалюты отменена. Обратитесь к оператору. ',
            'en' => 'Your request to buy crypto has been disapproved. Contact the operator.'
        ];
        $oneSignalService->send($client, 'chat', $contents);
        $transaction->update([
            'status' => TransactionStatusEnumType::FAILED->name,
        ]);
    }


    public function cancelMetal(Request $request, Client $client, MetalAndCryptoCurrencyTransaction $transaction, OneSignalService $oneSignalService)
    {
        $crypto = Metal::findByClientId($client, $transaction->sort)->first();
        $crypto->addToBalance($transaction->quantity);
        $contents = [
            "ru" => 'Ваша заявка на продажу метала отменена. Обратитесь к оператору. ',
            'en' => 'Your request to buy metal has been disapproved. Contact the operator.'
        ];
        $oneSignalService->send($client, 'chat', $contents);
        $transaction->update([
            'status' => TransactionStatusEnumType::FAILED->name,
        ]);
    }

    public function activateCrypto(Request $request, int $client, MetalAndCryptoCurrencyTransaction $transaction, OneSignalService $oneSignalService)
    {
        $client = Client::where('id', $client)->first();
        $sum = $request->sum;
        if ($transaction->withdraw) {
            try {
                DB::beginTransaction();
                $client->addToBalance($sum);
                $metal = CryptoCurrency::findByClientId($client, $transaction->sort)->first();
                $transaction->balanceRequest()->create([
                    'sum' => $sum,
                    'withdraw' => false,
                    'status' => TransactionStatusEnumType::SUCCESS,
                    'client_id' => $client->id
                ]);
                $metal->subtractionFromBalance($transaction->quantity);
                $transaction->update([
                    'status' => TransactionStatusEnumType::SUCCESS->name,
                    'sum' => $sum,
                ]);
                $contents = [
                    "ru" => 'Ваша заявка на продажу криптовалюты одобрена. ',
                    'en' => 'Your request to buy crypto has been approved.'
                ];
                $oneSignalService->send($client, 'chat', $contents);
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
                DB::beginTransaction();
                $client->subtractionFromBalance($sum);
                $metal = CryptoCurrency::findByClientId($client, $transaction->sort)->first();
                $transaction->balanceRequest()->create([
                    'sum' => $sum,
                    'withdraw' => true,
                    'status' => TransactionStatusEnumType::SUCCESS,
                    'client_id' => $client->id
                ]);
                $metal->addToBalance($transaction->quantity);
                $transaction->update([
                    'status' => TransactionStatusEnumType::SUCCESS->name,
                    'sum' => $sum,
                ]);
                $contents = [
                    "ru" => 'Ваша заявка на покупку криптовалюты одобрена. ',
                    'en' => 'Your request to buy crypto has been approved.'
                ];
                $oneSignalService->send($client, 'chat', $contents);
                DB::commit();
            } catch (Throwable $e) {
                DB::rollBack();
                $transaction->update(['status' => TransactionStatusEnumType::FAILED->name]);
                return back()->withErrors([
                    'message' => $e->getMessage(),
                ]);
            }
        }

        return back();

    }
}
