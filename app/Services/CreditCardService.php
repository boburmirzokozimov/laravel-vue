<?php

namespace App\Services;

use App\Models\Client\BalanceRequest;
use App\Models\Client\Client;
use App\Models\Client\CreditCard\CardTransaction;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Models\Enum\StatusEnumType;
use Exception;
use Illuminate\Http\UploadedFile;

class CreditCardService
{
    public function __construct(private UploadService $uploadService)
    {
    }

    public function update(array $credentials, CreditCardRequest $cardRequest): void
    {
        $this->uploadService->removeOld($cardRequest, $credentials);

        $cardRequest->updateCardRequest($this->manageCredentials($credentials));
    }

    private function manageCredentials(array $credentials): array
    {
        if ($credentials['scan_passport'] instanceof UploadedFile) {
            $credentials['scan_passport'] = $this->uploadService->upload($credentials['scan_passport']);
        }

        if ($credentials['selfie_passport'] instanceof UploadedFile) {
            $credentials['selfie_passport'] = $this->uploadService->upload($credentials['selfie_passport']);
        }

        return $credentials;
    }

    public function handle(array $credentials, Client $client): void
    {
        $client->saveCardRequest($this->manageCredentials($credentials));
    }

    public function handleAnonymous(array $validated, Client $client): void
    {
        $client->saveCardRequest($validated);
    }

    public function updateAnonymous(array $validated, CreditCardRequest $cardRequest): void
    {
        $cardRequest->updateCardRequest($validated);
    }

    public function activate(array $credentials): void
    {
        CreditCard::query()->create([
            'client_id'              => $credentials['client_id'],
            'credit_card_request_id' => $credentials['credit_card_request_id'],
            'card_number'            => $credentials['card_number'],
            'expire_date'            => $credentials['expire_date'],
        ]);
    }

    public function createTransaction(array $validated, CreditCard $card): void
    {
        if (isset($validated['withdraw']) and boolval($validated['withdraw']) === true) {
            $validated['invoice_file'] = $this->uploadService->uploadInvoice($validated['invoice_file']);
        }

        $balanceRequest = new BalanceRequest();
        $balanceRequest->sum = $validated['sum'];
        $balanceRequest->type = 'CARD_TRANSACTION';
        $balanceRequest->client_id = $card->client_id;
        $balanceRequest->status = 'SUCCESS';
        $balanceRequest->withdraw = true;

        $balanceRequest->save();


        $transaction = $card->createTransaction($validated);
        $this->acceptTransaction($card, $transaction);
        $card->client->subtractionFromBalance($balanceRequest->sum);
        $card->client->save();
    }

    /**
     * @throws Exception
     */
    public function acceptTransaction(CreditCard $card, CardTransaction $cardTransaction): void
    {

        if ($cardTransaction->withdraw) {
            $card->withdrawBalance($cardTransaction->sum);
        } else {

            $card->depositBalance($cardTransaction->sum);
        }
        $cardTransaction->status = StatusEnumType::SUCCESS->name;
        $cardTransaction->save();
        $card->save();

    }

}
