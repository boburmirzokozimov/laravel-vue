<?php

namespace App\Http\Controllers\Client\CreditCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCreditCardRequest;
use App\Http\Requests\CreditCardRequest as CreditCardRequestForm;
use App\Http\Requests\UpdateCreditCardRequest;
use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Models\Enum\CreditCardStatusEnumType;
use App\Services\CreditCardService;
use Inertia\Inertia;

class ManageCreditCardRequestController extends Controller
{
    public function __construct(private CreditCardService $cardService)
    {
    }

    public function store(CreateCreditCardRequest $request, Client $client)
    {
        $this->cardService->handle($request->validated(), $client);

        return to_route('clients.show', ['client' => $client]);
    }

    public function storeAnonymous(CreateCreditCardRequest $request, Client $client)
    {
        $this->cardService->handleAnonymous($request->validated(), $client);

        return to_route('clients.show', ['client' => $client]);
    }

    public function updateAnonymous(UpdateCreditCardRequest $request, Client $client, CreditCardRequest $cardRequest)
    {
        $this->cardService->updateAnonymous($request->validated(), $cardRequest);

        return to_route('clients.show', ['client' => $client]);
    }

    public function activate(CreditCardRequestForm $request, Client $client, CreditCardRequest $cardRequest)
    {
        $this->cardService->activate($request->validated());

        $cardRequest->update(['status' => CreditCardStatusEnumType::RELEASED]);

        return to_route('clients.show', ['client' => $client]);
    }

    public function update(UpdateCreditCardRequest $request, Client $client, CreditCardRequest $cardRequest)
    {
        $this->cardService->update($request->validated(), $cardRequest);

        return to_route('clients.show', ['client' => $client]);
    }

    public function create(Client $client)
    {
        return Inertia::render('Clients/CreditCard/Request/CreateCreditCardRequest')->with([
            'client' => $client
        ]);
    }
}
