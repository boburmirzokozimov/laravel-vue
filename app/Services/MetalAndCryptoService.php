<?php

namespace App\Services;

use App\Models\Client\Crypto\CryptoRates;
use App\Models\Client\Metal\MetalRates;
use Carbon\Carbon;

class MetalAndCryptoService
{
    public function handleMetal(array $rates): void
    {
        foreach ($rates['rates'] as $key => $value) {
            MetalRates::create([
                'type' => $key,
                'rate' => $value,
                'diff' => $this->findDiffMetal($key, $value),
                'updated_at' => Carbon::createFromTimestamp($rates['timestamp'])->toDateTimeImmutable(),
            ]);
        }
    }

    private function findDiffMetal(string $key, float $value): ?float
    {
        $prevRates = MetalRates::lastType($key)?->rate;

        if ($prevRates !== null) {
            return number_format((($value - $prevRates) / $prevRates), 4, '.', '');
        } else {
            return null;
        }
    }

    public function handleCrypto(array $rates): void
    {
        foreach ($rates as $key => $value) {
            CryptoRates::create([
                'type' => $key,
                'rate' => $value['rate'],
                'diff' => $this->findDiffCrypto($key, $value['rate']),
                'updated_at' => time(),
            ]);
        }
    }

    private function findDiffCrypto(string $key, float $value): ?float
    {
        $prevRates = CryptoRates::lastType($key)?->rate;
        if ($prevRates !== null) {
            return number_format((($value - $prevRates) / $prevRates), 4, '.', '');
        } else {
            return null;
        }
    }
}
