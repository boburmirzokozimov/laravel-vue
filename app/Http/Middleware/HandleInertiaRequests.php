<?php

namespace App\Http\Middleware;

use App\Models\Chat\Message;
use App\Models\Client\Client;
use App\Models\Notification\Notification;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'notifications' => Notification::unreadNotifications()
                ->with(['notifiable' => function (MorphTo $morphTo) {
                    $morphTo->morphWith([
                        Message::class => ['messageble'],
                        Client::class => [],
                    ]);
                }])->get(),
            'messageNotificationsCount' => Notification::unreadNotifications()->with(['notifiable' => function (MorphTo $morphTo) {
                $morphTo->morphWith([
                    Message::class => ['messageble'],
                    Client::class => [],
                ]);
            }])->where('type', '=', 'message')->get(),
            'balanceNotificationsCount' => Notification::unreadNotifications()->where('type', '=', 'transaction replenish')->count(),
            'metalNotificationsCount' => Notification::unreadNotifications()->where('type', '=', 'metal transaction')->count(),
            'cryptoNotificationsCount' => Notification::unreadNotifications()->where('type', '=', 'crypto transaction')->count(),
            'cardNotificationsCount' => Notification::unreadNotifications()->where('type', '=', 'card')->count(),
            'is_operator' => Auth::user() ? Auth::user()->role->hasPermissionTo('create') : '',
            'is_manager' => Auth::user() ? Auth::user()->role->hasPermissionTo('accept') : '',
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
