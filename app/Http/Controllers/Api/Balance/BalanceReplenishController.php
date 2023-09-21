<?php

namespace App\Http\Controllers\Api\Balance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Balance\CreateBalanceReplenishForm;
use App\Services\UploadService;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BalanceReplenishController extends Controller
{
    public function __construct(private UploadService $uploadService)
    {
    }

    public function manage(CreateBalanceReplenishForm $request): JsonResponse
    {
        $credentials = $request->validated();

        $client = Auth::user();

        $client->manageBalance($credentials);

        $client->notifyUser([
            'type' => 'transaction replenish',
        ]);

        return response()->json([
            'data' => 'Success',
        ]);
    }

    public function history(Request $request): JsonResponse
    {
        $client = Auth::user();

        return response()->json([
            'data' => $client->balanceRequest()
                ->orderBy('id', 'desc')
                ->when(\Illuminate\Support\Facades\Request::input('status'), function ($query, string $search) {
                    $statuses = explode(',', strtoupper($search));
                    $query->whereIn('status', $statuses);
                })
                ->when(\Illuminate\Support\Facades\Request::input('withdraw'), function ($query, string $search) {
                    $query->where('withdraw', $search);
                })
                ->simplePaginate($request->query->get('per-page', 10), page: $request->query->get('page', 1))
                ->through(function ($cardTransactions) {
                    return [
                        'id' => $cardTransactions->id,
                        'sum' => $cardTransactions->sum,
                        'status' => $cardTransactions->status,
                        'usdt_type' => $cardTransactions?->usdt_type,
                        'currency' => $cardTransactions?->currency,
                        'type' => $cardTransactions->type ?: $cardTransactions?->metalAndCryptoCurrencyTransaction?->sort,
                        'withdraw' => $cardTransactions->withdraw,
                        'withdraw_account_number' => $cardTransactions->withdraw_account_number,
                        'created_at' => $cardTransactions->created_at,
                    ];
                }),
        ]);
    }

    public function requisite(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'type' => 'string',
            'sum' => 'string|required',
            'invoice_file' => 'file'
        ]);

        $client = Auth::user();

        $credentials['invoice_file'] = $this->uploadService->uploadInvoice($credentials['invoice_file']);
        $client->manageBalance($credentials, true);

        return response()->json([
            'data' => 'Success',
        ]);
    }
}
