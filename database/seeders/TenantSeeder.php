<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run()
    {
        $plan = Plan::where('url', 'vip')->first();
//        $plan = Plan::first();

        $plan->tenants()->create(
            [
                'document' => '33.579.813/0001-37',
                'name' => 'Cod1green',
                'url' => 'cod1green',
                'email' => config('admin.admin_email'),
            ]
        );
    }
}
