<?php

namespace Database\Seeders;

use App\Models\Country\Country;
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
            $new['name_common'] = $country['name']['common'];
            $new['name_official'] = $country['name']['official'];
            $new['name'] = $country['translations']['rus']['common'];
            $new['flag'] = $country['flags']['svg'];
            return $new;
        }, $data);

        foreach ($new as $key => $value) {
            Country::create([
                'name_common' => $value['name_common'],
                'name_official' => $value['name_official'],
                'name' => $value['name'],
                'flag' => $value['flag'],
            ]);
        }
    }
}
