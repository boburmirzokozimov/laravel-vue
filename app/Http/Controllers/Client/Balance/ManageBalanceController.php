<?php

namespace App\Http\Controllers\Client\Balance;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageBalanceRequest;
use App\Models\Client\BalanceRequest;
use App\Models\Client\Client;
use App\Models\Country\Country;
use App\Services\OneSignalService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ManageBalanceController extends Controller
{
    public function manage(ManageBalanceRequest $request, Client $client)
    {
        $client->manageBalance($request->validated());

        return to_route('clients.show', ['client' => $client]);
    }

    public function create(Client $client)
    {
        return Inertia::render('Clients/BalanceRequest/CreateBalanceRequest')->with([
            'client' => $client,
            'countries' => Country::all('id', 'name')->where('id', '>', 250)
        ]);
    }

    public function changeStatus(Request $request, BalanceRequest $balanceRequest, OneSignalService $oneSignalService)
    {
        $status = $request->validate([
            'status' => 'in:WAITING,HOLD,CANCELED,VERIFICATION,SUCCESS'
        ]);
        $balanceRequest->update($status);
        if ($status['status']) {
            $contents = [
                "ru" => 'Ваша заявка на оплату по реквизиту одобрена. ',
                'en' => 'Your payment requisite has been approved.'
            ];
            $oneSignalService->send($balanceRequest->client, 'chat', $contents);
        }
        if ($balanceRequest->status->isCancelled()) {
            $balanceRequest->client->addToBalance($balanceRequest->sum);
            if ($status['status']) {
                $contents = [
                    "ru" => 'Ваша заявка на оплату по реквизиту отменена. Обратитесь к оператору.',
                    'en' => 'Your payment requisite has been disapproved. Contact the operator'
                ];
                $oneSignalService->send($balanceRequest->client, 'chat', $contents);
            }
            $balanceRequest->client->save();
        }
        return back();
    }

    public function activate(Client $client, BalanceRequest $balanceRequest, OneSignalService $oneSignalService)
    {
        try {
            DB::beginTransaction();
            $client->activate($balanceRequest);
            $content = [
                'ru' => 'Ваша заявка на пополнения баланса одобрена.',
                'en' => 'Your request to replenish your balance has been accepted'
            ];
            $oneSignalService->send($client, 'balance', $content);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'message' => $e->getMessage(),
            ]);
        }
        return back();
    }


}
