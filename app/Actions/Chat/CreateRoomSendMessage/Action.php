<?php

namespace App\Actions\Chat\CreateRoomSendMessage;

use App\Models\Chat\ChatRoom;
use App\Models\Chat\Message;
use App\Models\Client\Client;
use App\Services\CentrifugeService;
use App\Services\OneSignalService;
use GuzzleHttp\Exception\GuzzleException;

class Action
{
    public function __construct(private readonly OneSignalService  $oneSignalService,
                                private readonly CentrifugeService $centrifugeService)
    {
    }

    /**
     * @throws GuzzleException
     */
    public function handle(Command $command): void
    {
        $chatRoom = $command->client->chatRoom()->firstOrCreate()->load('client');

        $message = $command->user
            ->messages()
            ->create([
                'message' => $command->message,
                'chat_room_id' => $chatRoom->id
            ]);

        $this->createRoom($chatRoom);
        $this->publishToRoom($command->client, $chatRoom->id, $message);
        $this->notifyClient($command->client);
    }

    /**
     * @throws GuzzleException
     */
    private function createRoom(ChatRoom $chatRoom): void
    {
        $this->centrifugeService->publishRoom($chatRoom);
    }

    /**
     * @throws GuzzleException
     */
    private function publishToRoom(Client $client, int $chatRoom, Message $message): void
    {
        $this->centrifugeService->publishToChat($client, $chatRoom, $message);
    }

    private function notifyClient(Client $client): void
    {
        $this->oneSignalService->send($client, 'chat', $this->getContent());
    }

    private function getContent(): array
    {
        return [
            "ru" => 'У вас новое сообщение в чате.',
            'en' => 'You have got a new message.'
        ];
    }
}
