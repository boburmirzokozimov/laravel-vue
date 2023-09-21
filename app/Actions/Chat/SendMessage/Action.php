<?php

namespace App\Actions\Chat\SendMessage;

use App\Models\Chat\Message;
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
        $this->publish($command);
        $this->notify($command);
    }

    /**
     * @throws GuzzleException
     */
    private function publish(Command $command): void
    {
        $message = $this->getMessage($command);
        $this->centrifugeService->publishToChat($command->client, $command->chatRoom, $message);
    }

    private function getMessage(Command $command): Message
    {
        return $command->user
            ->messages()
            ->create($command->data());
    }

    private function notify(Command $command): void
    {
        $this->oneSignalService->send($command->client, 'chat', $this->getContent());
    }

    private function getContent(): array
    {
        return [
            "ru" => 'У вас новое сообщение в чате.',
            'en' => 'You have got a new message.'
        ];
    }
}
