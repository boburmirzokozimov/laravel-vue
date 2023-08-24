<?php

namespace App\Http\Controllers\Client\CreditCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\CreditCardRequest;
use App\Models\Client\CreditCard\CardTransaction;
use App\Models\Client\CreditCard\CreditCard;
use App\Services\CreditCardService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CreditCardController extends Controller
{
    public function __construct(private CreditCardService $service)
    {
    }

    public function create(CreditCard $card)
    {
        return Inertia::render('Clients/CreditCard/Payment/ManageBalance')
            ->with([
                'card' => $card
            ]);
    }

    public function manage(CreateTransactionRequest $request, CreditCard $card)
    {
        $this->service->createTransaction($request->validated(), $card);

        return to_route('clients.show', ['client' => $card->client->id]);
    }

    public function accept(CreditCard $card, CardTransaction $cardTransaction)
    {
        try {
            DB::beginTransaction();
            $this->service->acceptTransaction($card, $cardTransaction);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'message' => $e->getMessage(),
            ]);
        }
        return back();
    }

    public function changeStatus(Request $request, CardTransaction $cardTransaction)
    {
        $status = $request->validate([
            'status' => 'in:WAITING,HOLD,CANCELED,VERIFICATION,SUCCESS'
        ]);
        $cardTransaction->update($status);
        return back();
    }

    public function update(CreditCardRequest $cardRequest, CreditCard $card)
    {
        $card->update([
            'card_number' => $cardRequest->validated('card_number'),
            'expire_date' => $cardRequest->validated('expire_date'),
        ]);

        $card->save();

        return back();
    }
}
