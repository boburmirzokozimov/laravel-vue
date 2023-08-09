<?php

namespace App\Services;

use App\Models\Courier\Courier;

class CourierService
{
    public static function create(array $credentials): void
    {
        Courier::create($credentials);
    }

    public static function update(array $validated, Courier $courier): void
    {
        $courier->update($validated);
    }

    public static function delete(Courier $courier): void
    {
        $courier->deleteOrFail();
    }
}
