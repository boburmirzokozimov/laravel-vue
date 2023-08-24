<?php

namespace App\Http\Controllers\Api\Balance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Balance\CreateBalanceReplenishForm;
use App\Models\Client\Client;
use App\Services\UploadService;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BalanceReplenishController extends Controller
{
    public function __construct(private UploadService $uploadService)
    {
    }
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
    public function manage(CreateBalanceReplenishForm $request): JsonResponse
    {
        $credentials = $request->validated();

        $client = Client::findByToken($request->bearerToken())->first();

        $client->manageBalance($credentials);

        return response()->json([
            'data' => 'Success',
        ]);
    }

    public function history(Request $request): JsonResponse
    {
        /** @var Client $client */
        $client = Client::findByToken($request->bearerToken())->first();

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
                        'usdt_type' => $cardTransactions->usdt_type,
                        'type' => $cardTransactions->type,
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

        $client = Client::findByToken($request->bearerToken())->first();

        $credentials['invoice_file'] = $this->uploadService->uploadInvoice($credentials['invoice_file']);

        $client->manageBalance($credentials);

        return response()->json([
            'data' => 'Success',
        ]);
    }
}
