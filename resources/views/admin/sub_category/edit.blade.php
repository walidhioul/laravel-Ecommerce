@extends('admin.layouts.layout')

@section('admin_layout')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Edit Sub Category</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
    <div class="alert alert-danger p-4 mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        
            @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
        
        <form action="{{route('update.subcategory',$subcategory_info->id)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="sub_category_name">Give name of your sub category</label>         
            <input type="text" name="sub_category_name" class="form-control" value="{{$subcategory_info->sub_category_name}}" required>
            <label for="category_id">Select Category</label>         
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $subcategory_info->category_id == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-3">Edit Sub Category</button>
            
        </form>
        
       
    </div>
</div>
@endsection
