<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Plan::create(
            [
                'name' => 'VIP',
                'price' => 0.0,
                'description' => 'Plano VIP',
                'access' => 'private',
            ]
        );

        $p2 = Plan::create(
            [
                'name' => 'PRO',
                'price' => 399.99,
                'description' => 'Plano PRO',
            ]
        );

        $p3 = Plan::create(
            [
                'name' => 'Business',
                'price' => 599.99,
                'description' => 'Plano para seu Negócio',
            ]
        );

        $p4 = Plan::create(
            [
                'name' => 'Enterprise',
                'url' => 'enterprise',
                'price' => 749.99,
                'description' => 'Plano Empresarial',
            ]
        );
    }
}
