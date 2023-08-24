<?php

namespace Database\Seeders;

use App\Models\Courier\Courier;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courier::factory(10)->create();
    }
}
