@extends('admin.layouts.layout')

@section('admin_layout')
<div class="container mt-4">
    <h2 class="mb-3">Sub Category List</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Sub Category Name</th>
                    <th>Category</th> <!-- Added Actions column -->
                    <th>Category id</th> <!-- Added Actions column -->

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 mb-2 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
                @foreach($subcategories as $subcat)
                <tr>
                    <td>{{$subcat->id}}</td>
                    <td>{{$subcat->sub_category_name}}</td>
                    <td>{{$subcat->category->category_name}}</td>
                    <td>{{$subcat->category->id}}</td>

                    <td>
                        <a href="{{route('edit.subcategory',$subcat->id)}}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{route('delete.subcategory',$subcat->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
