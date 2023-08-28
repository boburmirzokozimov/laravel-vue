<?php

namespace App\Console\Commands;

use App\Services\MetalAndCryptoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateMetalRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metal:update';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update metal rates';

    public function __construct(private MetalAndCryptoService $service)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $response = Http::withHeaders([
            'X-API-KEY' => config('metal.api_key')
        ])
            ->get(config('metal.api_base_url') . 'latest?base=USD&currencies=XPT,XAU,XAG')
            ->body();
        $response = json_decode($response, true);

        if ($response['success']) {
            $this->service->handleMetal($response);
            $this->info('Successfully updated');
        } else {
            $this->alert('Reached limit');
        }
    }
}
