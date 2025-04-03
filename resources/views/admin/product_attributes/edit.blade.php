@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Product Attribute</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attribute.update', $attribute->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="attribute_value" class="form-label">Attribute Value</label>
            <input type="text" class="form-control" id="attribute_value" name="attribute_value" value="{{ $attribute->attribute_value }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
