<?php

namespace Database\Seeders;

use Database\Factories\CountryFactory;
use Illuminate\Database\Seeder;
use Webpatser\Countries\Countries;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        Countries::insert(app(CountryFactory::class)->definition());
    }
}
