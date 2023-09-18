<?php

namespace App\Services;

use App\Models\Client\Client;
use Ladumor\OneSignal\OneSignal;

class OneSignalService
{
    public function send(Client $client, string $meta, array $content): void
    {
        $fields = [
            'include_player_ids' => [$client?->one_signal_token],
            'data' => ['meta' => $meta],
            'contents' => $content
        ];
        dd(OneSignal::sendPush($fields));
    }
}
