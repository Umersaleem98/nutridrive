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
        // dd();

        $categories = Category::all();
        return view('admin.Products.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // Initialize an array to store image paths
        $imageNames = [];
    
        // Check if 'images' input exists and if files are uploaded
        if ($request->hasFile('images')) {
            // Ensure the 'products' directory exists, create if it doesn't
            $directory = public_path('products');
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true); // Create the directory with permissions
            }
    
            // Loop through the uploaded files
            foreach ($request->file('images') as $image) {
                // Generate a unique name for each image
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // Move the image to the 'public/products' directory
                $image->move($directory, $imageName);
                
                // Add the image name to the array
                $imageNames[] = $imageName;
            }
        }
    
        // Create a new product instance and fill its fields
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
    
        // Store the image names as a JSON-encoded string
        $product->images = json_encode($imageNames);
    
        // Set the product status
        $product->status = $request->status;
    
        // Save the product to the database
        $product->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    
    



public function edit($id)
{
    $product = Product::find($id);
    $categories = Category::all(); // Fetch all categories
    return view('admin.Products.edit',  compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Store current image(s) before deletion, if necessary
    $existingImages = $product->images; // Assuming the images are stored as an array or a JSON field

    // Update product details
    $product->name = $request->name;
    $product->category_id = $request->category_id;
    $product->price = $request->price;
    $product->sale_price = $request->sale_price;
    $product->stock = $request->stock;
    $product->description = $request->description;
    $product->status = $request->status;

    // Handle image upload if new images are provided
    if ($request->hasFile('images')) {
        // Delete existing images first (assuming they are stored on the server)
        if ($existingImages) {
            foreach ($existingImages as $image) {
                $imagePath = public_path('uploads/products/' . $image); // Path where images are stored
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image file
                }
            }
        }

        // Upload new images and store them
        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $imagePaths[] = $imageName;
        }

        // Update the product with new image paths (assuming storing as array or JSON)
        $product->images = $imagePaths;
    }

    // Save the updated product
    $product->save();

    return redirect()->back()->with('success', 'Product updated successfully!');
}



public function destroy($id)
{
    $category = Product::find($id);
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully.');
}
}
