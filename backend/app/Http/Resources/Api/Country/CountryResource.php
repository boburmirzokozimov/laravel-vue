<?php

namespace App\Http\Resources\Api\Country;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_common' => $this->name_common,
            'name_official' => $this->name_official,
            'flag' => $this->flag,
        ];
    }
}
