<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function show()
    {
        $products = Product::all();
        return view('admin.Products.list', compact('products'));
    }
   
    public function index()
    {
        $categories = Category::all();
        return view('admin.Products.index', compact('categories'));
    }

    public function store(Request $request)
{
    // Validate the form input
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|numeric|min:0',
        'description' => 'required|string',
    ]);

    // Create a new product
    Product::create([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Product added successfully!');
}
}
