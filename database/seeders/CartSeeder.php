<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        
        // Add sample products to the cart for this user
        $product1 = Product::where('name', 'Smartphone')->first();
        $product2 = Product::where('name', 'Jeans')->first();

        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product1->id,
            'quantity' => 1,
        ]);

        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product2->id,
            'quantity' => 2,
        ]);
    }
}
