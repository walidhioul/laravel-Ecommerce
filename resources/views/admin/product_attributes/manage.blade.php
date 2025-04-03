@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Product Attributes</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attributes as $attribute)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attribute->attribute_value }}</td>
                    <td>
                        <a href="{{ route('attribute.update', $attribute->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('attribute.delete', $attribute->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this attribute?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
