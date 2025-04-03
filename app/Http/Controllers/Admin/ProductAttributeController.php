<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index()
    {
        $attributes = DefaultAttribute::all();
        return view('admin.product_attributes.create', compact('attributes'));
    }

    public function manage()
    {
        return view('admin.product_attributes.manage');
    }

    public function create(Request $request)
    {
        $validate_data = $request->validate([
            'attribute_value' => 'required|string|max:255',
        ]);
        

        DefaultAttribute::create($validate_data);

        return redirect()->back()->with('success', 'Attribute created successfully!');
    }

    public function show()
    {
        $attributes = DefaultAttribute::all();
        return view('admin.product_attributes.manage', compact('attributes'));
    }

    public function edit($id)
    {
        $attribute = DefaultAttribute::findOrFail($id);
        return view('admin.product_attributes.edit', compact('attribute'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'attribute_value' => 'required|string|max:255',
        ]);

        $attribute = DefaultAttribute::findOrFail($id);
        $attribute->update([
            'attribute_value' => $request->input('attribute_value'),
        ]);

        return redirect()->route('attribute.show')->with('success', 'Attribute updated successfully!');
    }

    public function destroy($id)
    {
        $attribute = DefaultAttribute::findOrFail($id);
        $attribute->delete();

        return redirect()->route('attribute.show')->with('success', 'Attribute deleted successfully!');
    }
}
