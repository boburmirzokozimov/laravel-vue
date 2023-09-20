<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification\Notification;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function single(Notification $notification)
    {
        $notification->markAsRead();
        return back();
    }

    public function all()
    {
        Notification::query()
            ->where('isRead', false)
            ->update(['isRead' => true]);
        return back();
    }
}
