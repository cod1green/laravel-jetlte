<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::first();

        Coupon::factory()
            ->count(3)
            ->for($tenant)
            ->create();
    }
}
