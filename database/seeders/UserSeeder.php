<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::first();

        $user = User::factory()
            ->make(
                [
                    'tenant_id' => $tenant->id,
                    'name' => 'Administrador',
                    'username' => 'admin',
                    'sex' => 'M',
                    'email' => config('admin.admin_email'),
                    'password' => config('admin.admin_password'),
                    'phone' => '(11) 99189-6668',
                    'birth' => '1988-06-15',
                    'bio' => 'Administrador do sistema',
                ]
            )->save();
    }
}
