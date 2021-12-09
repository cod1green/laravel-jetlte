<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::factory()
            ->count(1)
            ->for(Tenant::first())
            ->create();

        Product::inRandomOrder()->first()->categories()->attach($category);
    }
}
