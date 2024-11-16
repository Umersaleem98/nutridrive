<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and accessories',
        ]);

        Category::create([
            'name' => 'Furniture',
            'description' => 'Furniture for home and office',
        ]);

        Category::create([
            'name' => 'Clothing',
            'description' => 'Apparel and fashion',
        ]);
    }
}
