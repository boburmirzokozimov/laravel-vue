<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents('countries.json', true), true);
        $new[] = [];
        $new = array_map(function ($country) {
            return $country['translations']['rus']['common'];
        }, $data);

        foreach ($new as $key => $value) {
            Country::create([
                'name' => $value
            ]);
        }
    }
}
