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
    
    
   


}
