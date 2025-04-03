<div>
    <!-- Category Dropdown -->
    <select wire:model="selectedCategory" class="form-control mb-2">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>

    <!-- Subcategory Dropdown -->
    <select class="form-control" @if(empty($subcategories)) disabled @endif>
        <option value="">Select Subcategory</option>
        @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
        @endforeach
    </select>
</div>

@livewireScripts
