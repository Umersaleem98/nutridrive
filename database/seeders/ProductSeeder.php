<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $electronics = Category::where('name', 'Electronics')->first();
        $furniture = Category::where('name', 'Furniture')->first();
        $clothing = Category::where('name', 'Clothing')->first();

        Product::create([
            'name' => 'Smartphone',
            'category_id' => $electronics->id,
            'price' => 299.99,
            'stock' => 50,
            'description' => 'A smartphone with great features.',
        ]);

        Product::create([
            'name' => 'Office Chair',
            'category_id' => $furniture->id,
            'price' => 99.99,
            'stock' => 20,
            'description' => 'Comfortable office chair with adjustable height.',
        ]);

        Product::create([
            'name' => 'Jeans',
            'category_id' => $clothing->id,
            'price' => 49.99,
            'stock' => 100,
            'description' => 'Stylish denim jeans for casual wear.',
        ]);
    }
}
