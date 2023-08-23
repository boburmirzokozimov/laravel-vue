<?php

namespace App\Http\Resources\Api\Country;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection
        ];
    }
}
