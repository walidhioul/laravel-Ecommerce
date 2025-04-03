@extends('seller.layouts.layout')
@section('seller_page_title')
store
@endsection

@section('seller_layout')
<div class="container mt-4">
    <h2 class="mb-3">Stores List</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Store Name</th>
                    <th>Store Description</th>
                    <th>Store Slug</th>
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
                @foreach($stores as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->store_name}}</td>
                    <td>{{$s->description}}</td>
                    <td>{{$s->slug}}</td>

                    

                    <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>

                        <form action="" method="POST" class="d-inline">
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
