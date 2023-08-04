<?php

namespace Database\Seeders;

use App\Models\Client\BalanceRequest;
use App\Models\Client\Client;
use Illuminate\Database\Seeder;

class BalanceRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = Client::factory()->create();
        BalanceRequest::factory(10)->create(['client_id' => $client->id]);
    }
}
