<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification\Notification;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Notification $notification)
    {
        $notification->markAsRead();
        return back();
    }
}
