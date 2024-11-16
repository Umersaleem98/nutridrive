<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CartSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
        ]);
    }
}
