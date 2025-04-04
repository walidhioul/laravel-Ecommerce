@extends('seller.layouts.layout')

@section('seller_page_title')
Dashbord
@endsection

@section('seller_layout')


<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->product_name }}</td>
                <td>${{ number_format($product->regular_price, 2) }}</td>
                <td>{{ $product->stock_quantity	 }}</td>
                <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                <td>
                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                    <form action="" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection