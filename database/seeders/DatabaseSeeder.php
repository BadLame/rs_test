<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    function run(): void
    {
        Product::factory(rand(20, 100))->create();
        Product::factory(rand(20, 100))->withProperties()->create();
    }
}
