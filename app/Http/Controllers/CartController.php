<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartpage()
{
    $cart = Cart::where('user_id', auth()->user()->id)->first();
    $cartItems = CartItem::with('product') // Eager load product data
        ->where('cart_id', $cart->id) // Fetch only the logged-in user's cart items
        ->get();

    return view('pages.cart', compact('cartItems'));
}


    public function addToCart(Request $request, $productId)
    {
        // Check if product exists
        $product = Product::findOrFail($productId);

        // Check if user is authenticated or using session ID for guests
        $userId = Auth::check() ? Auth::id() : null;
        
        $sessionId = session()->getId();
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        // Check if the product is already in the cart
        $cartItem = CartItem::where('product_id', $productId)
                        ->where('cart_id', $cart->id)
                        ->first();

        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Add the product to the cart
            CartItem::create([
                'product_id' => $productId,
                'quantity' => $request->quantity,
                'cart_id' => $cart->id,
                'price' => $product->price,
                'total' => $product->price * $request->quantity,
            ]);
        }

        // Redirect back to the store or cart page
        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }
    
    public function cartremove($id)
    {
        $cart = CartItem::find($id); // Find the cart item by ID
    
        if ($cart) {
            $cart->delete(); // Delete the cart item
            return redirect()->back()->with('success', 'Cart item deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Cart item not found.');
        }
    }

    public function deleteSelected(Request $request)
{
    $selectedItems = $request->input('selected_items', []);
    
    if (!empty($selectedItems)) {
        Cart::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('success', 'Selected items deleted successfully!');
    }

    return redirect()->back()->with('error', 'No items selected!');
}

}
