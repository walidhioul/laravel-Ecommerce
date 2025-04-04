@extends('seller.layouts.layout')

@section('seller_page_title')
Create Product
@endsection

@section('seller_layout')

<div class="container">
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" >
        @foreach ($errors->all() as $error)
    <li class=" bg-red-100 border">{{ $error }}</li>
    @endforeach

    </div>
    

    <form action="{{route('product.create')}}" method="POST" enctype="multipart/form-data" class="styled-form">
        @csrf
        <h1>Create Product</h1>

        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku" class="form-control">
        </div>
        <div class="form-group mt-3">
            <livewire:category-subcategory/>
        </div>
        
        <div class="form-group">
            <label for="store_id">Store</label>
            <select name="store_id" id="store_id" class="form-control" >
                <option value="">Select Store</option>
                @foreach($stores as $store)
                <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="regular_price">Regular Price</label>
            <input type="number" name="regular_price" id="regular_price" class="form-control" >
        </div>
        <div class="form-group">
            <label for="discounted_price">Discounted Price</label>
            <input type="number" name="discounted_price" id="discounted_price" class="form-control">
        </div>
        <div class="form-group">
            <label for="tax_rate">Tax Rate (%)</label>
            <input type="number" name="tax_rate" id="tax_rate" class="form-control">
        </div>
        <div class="form-group">
            <label for="stock_quantity">Stock Quantity</label>
            <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" >
        </div>
        <div class="form-group">
            <label for="stock_status">Stock Status</label>
            <select name="stock_status" id="stock_status" class="form-control">
                <option value="In Stock">In Stock</option>
                <option value="Out of Stock">Out of Stock</option>
            </select>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="visibility">Visibility</label>
            <select name="visibility" id="visibility" class="form-control" required>
                <option value="1">Visible</option>
                <option value="0">Hidden</option>
            </select>
        </div>
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input type="text" name="meta_title" id="meta_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea name="meta_description" id="meta_description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" >
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="images">Product Image</label>
            <input type="file" name="images[]" class="form-control" multiple >
        </div>
        <button type="submit" class="btn btn-primary mt-2">Create Product</button>
    </form>
</div>

<style>
    .styled-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .styled-form .form-group {
        margin-bottom: 15px;
    }
    .styled-form .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .styled-form .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 15px;
        border-radius: 4px;
        color: #fff;
    }
</style>

@endsection