<?php

namespace App\Console\Commands;

use App\Services\MetalAndCryptoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Log;

class UpdateCryptoCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(private MetalAndCryptoService $service,
                                private Log                   $logger)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = [];
        foreach ($this->cryptoList() as $crypto) {
            $response[$crypto] = Http::withHeaders([
                'X-CoinAPI-Key' => config('crypto.api_key'),
            ])
                ->get(config('crypto.api_base_url') . $crypto . '/USD')
                ->body();
            $response[$crypto] = json_decode($response[$crypto], true);
            if (array_key_exists('error', $response[$crypto])) {
                $this->logger::error('Crypto Error', $response[$crypto]);
                $this->alert($response[$crypto]['error']);
                return;
            }
        }

        if (count($response) !== 0) {
            $this->service->handleCrypto($response);
            $this->info('Successfully updated');
        }
    }

    private function cryptoList(): array
    {
        return ['BTC', 'ETH', 'BNB', 'ADA', 'DOT'];
    }
}
