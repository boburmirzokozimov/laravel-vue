<?php

namespace Database\Seeders;

use App\Models\Keys\Key;
use Illuminate\Database\Seeder;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Key::factory()->create();
    }
}
