<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CountrySeeder::class);
        $this->call(RoleSeeder::class);
//        $this->call(UserSeeder::class);
//        $this->call(ClientSeeder::class);
//        $this->call(BalanceRequestSeeder::class);
//        $this->call(CreditCardSeeder::class);
//        $this->call(CourierSeeder::class);
//        $this->call(BranchSeeder::class);
//        $this->call(KeySeeder::class);
    }
}
