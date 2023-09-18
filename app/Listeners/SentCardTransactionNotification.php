<?php

namespace App\Listeners;

use App\Models\User\User;
use Notification;

class SentCardTransactionNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $users = User::all();
        Notification::sent($users, $event->balanceRequest);
    }
}
