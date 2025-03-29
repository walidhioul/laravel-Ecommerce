<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.create');
    }

    public function manage()
    {
        // Fetch categories from db then pass them to the view to display them in table
        $categories = Category::all();
        return view('admin.category.manage',compact('categories'));
    }
}
