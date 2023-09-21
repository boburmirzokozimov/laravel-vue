<?php

namespace App\Services;

use Alexusmai\Centrifugo\Centrifugo;
use App\Models\Chat\ChatRoom;
use App\Models\Chat\Message;
use App\Models\Client\Client;
use GuzzleHttp\Exception\GuzzleException;

class CentrifugeService
{
    public function __construct(private Centrifugo $centrifugo)
    {
    }

    /**
     * @throws GuzzleException
     */
    public function publishToChat(Client $client, int $chatRoom, Message $message): void
    {
        $this->centrifugo->publish('fin_help:chat#' . $client->id, [
            'client' => $client,
            'chat_room_id' => $chatRoom,
            'message' => $message
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function publishRoom(ChatRoom $chatRoom): void
    {
        $this->centrifugo->publish('fin_help:chat', ['chatRoom' => $chatRoom]);
    }
}
