<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

    // Filter by Price
    if ($request->has('min_price') && $request->has('max_price')) {
        $query->whereBetween('price', [$request->min_price, $request->max_price]);
    }

    // Sort by Reference
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

    // Paginate results
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
        return view('pages.cart');
    }
    public function checkoutpage()
    {
        return view('pages.checkout');
    }


}
