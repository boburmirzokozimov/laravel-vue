<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Countries;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = json_decode(file_get_contents('countries.json', true), true);
        $new[] = [];
        $new = array_map(function ($country) {
            return $country['translations']['rus']['common'];
        }, $data);

        foreach ($new as $key => $value) {
            Countries::create([
                'name' => $value
            ]);
        }
    }
}
