<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
    public function index()
{
    $categories = Category::all();
    return view('admin.category.index', compact('categories'));
}
   

public function create()
{
    
    return view('admin.category.create');
}


public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
        'description' => 'nullable|string',
    ]);

    // Create and store the new category
    $category = new Category();
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Category created successfully.');
}

public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('admin.category.edit', compact('category'));
}

// Update the category in the database
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,' . $id,
        'description' => 'nullable|string',
    ]);

    $category = Category::find($id);
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();

    return redirect()->back()->with('success', 'Category updated successfully.');
}

// Delete a category
public function destroy($id)
{
    $category = Category::find($id);
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully.');
}
}
