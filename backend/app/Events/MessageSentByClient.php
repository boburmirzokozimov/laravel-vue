<?php

namespace App\Events;

use App\Models\Client\Client;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentByClient implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    private int $chat_room_id;
    private Client $client;

    /**
     * Create a new event instance.
     */
    public function __construct(Client $client, int $chat_room_id, string $message)
    {
        $this->message = $message;
        $this->chat_room_id = $chat_room_id;
        $this->client = $client;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat.' . $this->chat_room_id . '.' . $this->client->id),
        ];
    }
}
