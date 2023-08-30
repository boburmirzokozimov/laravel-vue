<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Client\BalanceRequest;
use App\Models\Enum\StatusEnumType;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function balance()
    {
        return Inertia::render('Transactions/Balance', [
            'balance_transactions' => BalanceRequest::query()
                ->orderBy('created_at', 'Desc')
                ->with('client')
                ->paginate(10),
            'transaction_statuses' => [
                StatusEnumType::SUCCESS->name => StatusEnumType::SUCCESS->name,
                StatusEnumType::HOLD->name => StatusEnumType::HOLD->name,
                StatusEnumType::CANCELED->name => StatusEnumType::CANCELED->name,
                StatusEnumType::WAITING->name => StatusEnumType::WAITING->name,
                StatusEnumType::VERIFICATION->name => StatusEnumType::VERIFICATION->name,
            ],
        ]);
    }
}
