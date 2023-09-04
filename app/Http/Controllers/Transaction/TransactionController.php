<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Client\BalanceRequest;
use App\Models\Enum\StatusEnumType;
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
                ->whereIn('type', ['CASH', 'USDT', 'CASHLESS'])
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
                    $query->where('full_name', 'LIKE', '%' . $fullName . '%');
                })
                ->orderBy('balance_requests.created_at', 'Desc')
                ->paginate(10)
                ->withQueryString()
                ->through(function ($transaction) {
                    return [
                        'id' => $transaction->id,
                        'client_id' => $transaction->client_id,
                        'type' => $transaction->type,
                        'credit_card_id' => $transaction?->creditCard?->id,
                        'status' => $transaction->status,
                        'sum' => $transaction->withdraw ? -$transaction->sum : $transaction->sum,
                        'withdraw' => $transaction->withdraw,
                        'created_at' => Carbon::create($transaction->created_at)->format('Y-m-d'),
                        'client_name' => $transaction->client->full_name
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

    //TODO:FINISHING TRANSACTION CONTROLLER
}
