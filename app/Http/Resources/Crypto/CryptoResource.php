<?php

namespace App\Http\Resources\Crypto;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CryptoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sort' => $this->sort,
            'sum' => $this->sum,
            'withdraw' => $this->withdraw,
            'quantity' => $this->quantity,
            'status' => $this->status,
        ];
    }
}
