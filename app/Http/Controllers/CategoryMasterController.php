<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryMasterController extends Controller
{
    public function storecategory(Request $request)
    {
        $validate_data = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        Category::create($validate_data);
        return redirect()->back()->with('success', 'Category created successfully!');
        
    }

    public function editcategory($id)
    {
        $category_info = Category::find($id);
        return view('admin.category.edit', compact('category_info'));


    }

    public function updatecategory(Request $request, $id)
    {
        $validate_data = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->update($validate_data);
        return redirect()->back()->with('success', 'Category updated successfully!');


    }

    public function deletecategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
        
    }

    

    
}
