<?php

namespace App\Http\Controllers\Client\CreditCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\CreditCardRequest;
use App\Models\Client\BalanceRequest;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Enum\StatusEnumType;
use App\Services\CreditCardService;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Throwable;

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

    public function accept(CreditCard $card, BalanceRequest $balanceRequest)
    {
        try {
            DB::beginTransaction();
            $card->withdrawBalance($balanceRequest->sum);
            $balanceRequest->status = StatusEnumType::SUCCESS->name;
            $balanceRequest->save();
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            return back()->withErrors([
                'message' => $e->getMessage(),
            ]);
        }
        return back();
    }


    public function update(CreditCardRequest $cardRequest, CreditCard $card)
    {
        DB::transaction(function () use ($card, $cardRequest) {
            $card->update([
                'card_number' => $cardRequest->validated('card_number'),
                'expire_date' => $cardRequest->validated('expire_date'),
            ]);
            $card->credit_card_request()->update([
                'name' => $cardRequest->validated('name'),
                'surname' => $cardRequest->validated('surname'),
                'middle_name' => $cardRequest->validated('middle_name'),
                'anonymous_name' => $cardRequest->validated('anonymous_name'),
                'anonymous_surname' => $cardRequest->validated('anonymous_surname'),
            ]);
        });

        return back();
    }
}
