<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            "uuid" => $this->faker->uuid(),
            "street" => $this->faker->streetAddress(),
            "state" => $this->faker->state(),
            "city" => $this->faker->city(),
            "street_extra" => $this->faker->streetSuffix(),
            "lat" => $this->faker->latitude(),
            "lng" => $this->faker->longitude(),
            "post_code" => $this->faker->postcode(),
            "country" => "BR",
            "country_id" => 1,
            "is_primary" => 1
        ];
    }
}
