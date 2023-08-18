<?php

namespace App\Http\Resources\Key;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KeyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'account_number' => $this->account_number,
            'wallet_number' => $this->wallet_number,
        ];
    }
}
