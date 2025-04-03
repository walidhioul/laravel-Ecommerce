<?php
namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class CategorySubcategory extends Component
{
    public $categories = [];
    public $subcategories = [];
    public $selectedCategory;

    public function mount()
    {
        $this->categories = Category::all();
        // You might want to load subcategories based on the selected category as well.
         $this->subcategories = SubCategory::all();
    }

    public function updatedSelectedCategory($categoryId)
    {
        $this->subcategories = SubCategory::where('category_id', $categoryId)->get();
        //$this->subcategories = SubCategory::all();
    }

    public function render()
    {
        return view('livewire.category-subcategory');
    }
}
