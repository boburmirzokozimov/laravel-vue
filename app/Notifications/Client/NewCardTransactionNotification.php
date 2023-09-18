<?php

namespace App\Notifications\Client;

use App\Models\Client\BalanceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewCardTransactionNotification extends Notification
{
    use Queueable;

    public function __construct(public BalanceRequest $balanceRequest)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'balanceRequest' => $this->balanceRequest,
        ];
    }
}
