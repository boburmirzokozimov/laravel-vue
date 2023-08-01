<?php

namespace App\Events;

use Illuminate\Auth\Events\Login;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class AddLastLoggedInDate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
    }

    public function handle(Login $event)
    {
        $event->user->last_visited = Carbon::now();
        $event->user->save();
    }
}
