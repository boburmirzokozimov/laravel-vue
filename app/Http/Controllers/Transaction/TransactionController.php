<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Client\BalanceRequest;
use App\Models\Client\MetalAndCryptoCurrencyTransaction;
use App\Models\Enum\StatusEnumType;
use App\Models\Enum\TransactionStatusEnumType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function balance()
    {
        return Inertia::render('Transactions/Balance', [
            'balance_transactions' => BalanceRequest::query()
                ->with('client')
                ->join('clients', 'balance_requests.client_id', '=', 'clients.id')
                ->when(Request::input('status'), function (Builder $query, string $status) {
                    $query->where('status', $status);
                })
                ->when(Request::input('type'), function (Builder $query, string $type) {
                    $query->where('balance_requests.type', $type);
                })
                ->when(Request::input('date'), function (Builder $query, string $date) {
                    $query->where('balance_requests.created_at', '>=', $date);
                })
                ->when(Request::input('full_name'), function (Builder $query, string $fullName) {
                    $query->where('clients.full_name', 'LIKE', '%' . $fullName . '%');
                })
                ->select(['*', 'balance_requests.id as balance_request_id'])
                ->orderBy('balance_requests.created_at', 'Desc')
                ->paginate(10)
                ->withQueryString()
                ->through(function ($transaction) {
                    return [
                        'id' => $transaction->balance_request_id,
                        'client_id' => $transaction->client_id,
                        'type' => $transaction->type,
                        'sort' => $transaction->sort,
                        'credit_card_id' => $transaction?->creditCard?->id,
                        'status' => $transaction->status,
                        'quantity' => $transaction->quantity,
                        'sum' => $transaction->withdraw ? -$transaction->sum : $transaction->sum,
                        'withdraw' => $transaction->withdraw,
                        'created_at' => Carbon::create($transaction->created_at)->format('Y-m-d'),
                        'client_name' => $transaction->client->full_name,
                        'invoice_file' => $transaction?->invoice_file,
                        'withdraw_account_number' => $transaction?->withdraw_account_number,
                        'info' => $transaction?->info,
                        'usdt_type' => $transaction?->usdt_type,
                        'currency' => $transaction?->currency,
                        'delivery' => $transaction?->delivery,
                        'phone' => $transaction?->phone,
                        'contact' => $transaction?->contact,
                        'metal_or_crypto_type' => $transaction?->metalAndCryptoCurrencyTransaction?->sort
                    ];
                }),
            'transaction_statuses' => [
                StatusEnumType::SUCCESS->name => StatusEnumType::SUCCESS->name,
                StatusEnumType::HOLD->name => StatusEnumType::HOLD->name,
                StatusEnumType::CANCELED->name => StatusEnumType::CANCELED->name,
                StatusEnumType::WAITING->name => StatusEnumType::WAITING->name,
                StatusEnumType::VERIFICATION->name => StatusEnumType::VERIFICATION->name,
            ],
            'filters' => Request::all(),

        ]);
    }

    public function metal()
    {
        return Inertia::render('Transactions/Metal/Index', [
            'metalTransactions' => MetalAndCryptoCurrencyTransaction::query()
                ->where('type', 1)
                ->whereIn('sort', ['XAU', 'XAG', 'XPT'])
                ->when(Request::input('status'), function (Builder $query, string $status) {
                    $query->where('status', $status);
                })
                ->when(Request::input('sort'), function (Builder $query, string $date) {
                    $query->where('sort', $date);
                })
                ->when(Request::input('date'), function (Builder $query, string $date) {
                    $query->where('created_at', '>=', $date);
                })
                ->orderBy('created_at', 'Desc')
                ->paginate(10)
                ->withQueryString()
                ->through(function ($transaction) {
                    return [
                        'id' => $transaction->id,
                        'client_id' => $transaction->client_id,
                        'type' => $transaction->type,
                        'sort' => $transaction->sort,
                        'credit_card_id' => $transaction?->creditCard?->id,
                        'status' => $transaction->status,
                        'quantity' => $transaction->quantity,
                        'sum' => $transaction->withdraw ? -$transaction->sum : $transaction->sum,
                        'withdraw' => $transaction->withdraw,
                        'created_at' => Carbon::create($transaction->created_at)->format('Y-m-d'),
                        'client_name' => $transaction->client->full_name
                    ];
                }),
            'transaction_statuses' => [
                TransactionStatusEnumType::SUCCESS->name => TransactionStatusEnumType::SUCCESS->name,
                TransactionStatusEnumType::FAILED->name => TransactionStatusEnumType::FAILED->name,
                TransactionStatusEnumType::WAITING->name => TransactionStatusEnumType::WAITING->name,
            ],
            'filters' => Request::all(),
        ]);

    }

    public function crypto()
    {
        return Inertia::render('Transactions/Crypto/Index', [
            'metalTransactions' => MetalAndCryptoCurrencyTransaction::query()
                ->where('type', 2)
                ->whereIn('sort', ['BTC', 'ETH', 'BNB', 'ADA', 'DOT'])
                ->when(Request::input('status'), function (Builder $query, string $status) {
                    $query->where('status', $status);
                })
                ->when(Request::input('sort'), function (Builder $query, string $date) {
                    $query->where('sort', $date);
                })
                ->when(Request::input('date'), function (Builder $query, string $date) {
                    $query->where('created_at', '>=', $date);
                })
                ->orderBy('created_at', 'Desc')
                ->paginate(10)
                ->withQueryString()
                ->through(function ($transaction) {
                    return [
                        'id' => $transaction->id,
                        'client_id' => $transaction->client_id,
                        'type' => $transaction->type,
                        'sort' => $transaction->sort,
                        'credit_card_id' => $transaction?->creditCard?->id,
                        'status' => $transaction->status,
                        'quantity' => $transaction->quantity,
                        'sum' => $transaction->withdraw ? -$transaction->sum : $transaction->sum,
                        'withdraw' => $transaction->withdraw,
                        'created_at' => Carbon::create($transaction->created_at)->format('Y-m-d'),
                        'client_name' => $transaction->client->full_name
                    ];
                }),
            'transaction_statuses' => [
                TransactionStatusEnumType::SUCCESS->name => TransactionStatusEnumType::SUCCESS->name,
                TransactionStatusEnumType::FAILED->name => TransactionStatusEnumType::FAILED->name,
                TransactionStatusEnumType::WAITING->name => TransactionStatusEnumType::WAITING->name,
            ],
            'filters' => Request::all(),
        ]);

    }

}
