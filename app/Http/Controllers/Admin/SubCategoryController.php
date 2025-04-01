<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); 
        return view('admin.sub_category.create',compact('categories'));
    }

    public function manage()
    {
       
        // Fetch subcategories from db then pass them to the view to display them in table
        $subcategories = SubCategory::with('category')->get();
        return view('admin.sub_category.manage', compact('subcategories'));
    }
}
