<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function show()
    {
        $products = Product::with('category')->get();
        // dd($products); 
        return view('admin.Products.list', compact('products'));
    }
   
    public function index()
    {
        $categories = Category::all();
        return view('admin.Products.index', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'required|string',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:active,inactive',
    ]);

    // Initialize an array to store image paths
    $imageNames = [];

    // Handle file uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);
            $imageNames[] = $imageName; // Store image names
        }
    }

    // Save product
    Product::create([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'sale_price' => $request->sale_price,
        'stock' => $request->stock,
        'description' => $request->description,
        'images' => json_encode($imageNames), // Store JSON of image names
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'Product added successfully!');
}



public function edit($id)
{
    $products = Product::find($id);
    $categories = Category::all(); // Fetch all categories
    return view('admin.Products.edit',  compact('products', 'categories'));
}


public function update(Request $request, $id)
{
    $product = Product::find($id);
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'required|string',
    ]);

    $product->update($request->all());

    return redirect('products')->with('success', 'Product updated successfully.');
}

public function destroy($id)
{
    $category = Product::find($id);
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully.');
}
}
