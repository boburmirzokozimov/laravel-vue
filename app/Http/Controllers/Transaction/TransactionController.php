<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Client\BalanceRequest;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function balance()
    {
        return Inertia::render('Transactions/Balance', [
            'balance_transactions' => BalanceRequest::query()
                ->orderBy('created_at', 'Desc')
                ->with('client')
                ->get()
        ]);
    }
}
