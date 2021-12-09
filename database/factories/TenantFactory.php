<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $plan = Plan::first();

        return [
            'uuid' => $this->faker->uuid(),
            'plan_id' => $plan ?? Plan::factory()->create(),
            'document' => $this->faker->cnpj(false),
            'name' => $this->faker->unique()->company,
            'url' => $this->faker->slug(),
            'email' => $this->faker->unique()->companyEmail,
        ];
    }
}
