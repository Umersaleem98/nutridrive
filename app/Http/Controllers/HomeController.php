<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function storepage()
    // {
    //     // Retrieve products with pagination
    //     $products = Product::paginate(10); // Show 10 products per page
    
    //     return view('pages.store', compact('products'));
    // }
    
    public function storePage(Request $request)
{
    $query = Product::query();

    // Apply search if a search term is provided
    if ($request->has('search') && !empty($request->search)) {
        $searchTerm = $request->search;
        $query->where('name', 'like', '%' . $searchTerm . '%')
              ->orWhere('description', 'like', '%' . $searchTerm . '%');
    }

    // Apply sorting if requested
    if ($request->has('sort')) {
        switch ($request->sort) {
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
        }
    }

    // Paginate results (9 items per page)
    $products = $query->paginate(9);

    return view('pages.store', compact('products'));
}

    
    public function single_storepage($id)
    {
        $products = Product::find($id);
        return view('pages.single_storepage', compact('products'));
    }
    
    public function aboutpage()
    {
        return view('pages.about');
    }
    
    public function contactpage()
    {
        return view('pages.contact');
    }
    
    public function cartpage()
{
    $cartItems = Cart::with('product') // Eager load product data
        ->where('user_id', auth()->id()) // Fetch only the logged-in user's cart items
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

        // Check if the product is already in the cart
        $cartItem = Cart::where('product_id', $productId)
                        ->where('user_id', $userId)
                        ->first();

        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Add the product to the cart
            Cart::create([
                'product_id' => $productId,
                'quantity' => $request->quantity,
                'user_id' => $userId,
            ]);
        }

        // Redirect back to the store or cart page
        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }
    


    public function checkoutpage()
    {
        return view('pages.checkout');
    }


}
