<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Http\Request; // Corrected import
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index()
    {
        $AuthUserId = Auth::user()->id; 
        $stores = Store::where('user_id',$AuthUserId)->get();

        return view('seller.product.create',compact('stores'));
    }

    public function manage()
    {
        $AuthUserId = Auth::user()->id; 
        $products = Product::where('seller_id',$AuthUserId)->get();

        return view('seller.product.manage',compact('products'));
    }

    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'store_id' => 'required|integer',
            'regular_price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'tax_rate' => 'nullable|numeric',
            'stock_quantity' => 'required|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
    
        $newproduct = Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'sku' => $request->sku,
            'seller_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'store_id' => $request->store_id,
            'regular_price' => $request->regular_price,
            'discounted_price' => $request->discounted_price,
            'tax_rate' => $request->tax_rate,
            'stock_quantity' => $request->stock_quantity,
            'stock_status' => $request->stock_status,
            'slug' => $request->product_name,
            'visibility' => $request->visibility,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'status' => 1, // Assuming 1 means active
        ]);

        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public'); // Store the image in the public disk

                ProductImage::create([
                    'product_id' => $newproduct->id,
                    'image_path' =>  $path, 
                    'is_primary' => false,
                ]);
            }
    
        }

        

        return redirect()->route('vendor.product.create')->with('success', 'Product created successfully.');
    }
    

}

