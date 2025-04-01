<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryMasterController extends Controller
{
    public function storeSubCategory(Request $request)
    {
        $validate_data = $request->validate([
            'sub_category_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        SubCategory::create($validate_data);

        return redirect()->back()->with('success', 'Sub-category created successfully!');
    }

    public function editSubCategory($id)
    {
        $subcategory_info = SubCategory::with('category')->find($id);
        $categories = \App\Models\Category::all();
        //dd($subcategory_info); 
        
        return view('admin.sub_category.edit', compact('subcategory_info', 'categories'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        $validate_data = $request->validate([
            'sub_category_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($validate_data);

        return redirect()->back()->with('success', 'Sub-category updated successfully!');
    }
    public function deleteSubCategory($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->back()->with('success', 'Sub-category deleted successfully!');
    }


}
