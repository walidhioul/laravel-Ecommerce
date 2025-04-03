@extends('seller.layouts.layout')

@section('seller_page_title')
store 
@endsection



@section('seller_layout')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Create Store</h5>
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
        
        <form action="{{route('store.create')}}" method="POST">
            @csrf
            <label for="store_name">Give name of your Store</label>         
            <input type="text" name="store_name" class="form-control" placeholder="walid store" required>

            <label for="description">Store Description</label>
            <textarea name="description" class="form-control" placeholder="" required></textarea>

            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="walid-store" required>
            <button type="submit" class="btn btn-primary mt-3">Create Store</button>
            
        </form>
        
       
    </div>
</div>
@endsection

