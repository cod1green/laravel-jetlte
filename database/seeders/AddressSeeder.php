<?php

namespace Database\Seeders;

use App\Models\Client;
use Database\Factories\AddressFactory;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $client = Client::first();

        $client->addAddress(app(AddressFactory::class)->definition());
    }
}
