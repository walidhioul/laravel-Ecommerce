<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerStoreController extends Controller
{
    public function index()
    {
        return view('seller.store.create');
    }

    public function manage()
    {
        $userid = Auth::user()->id;
        $stores = Store::where('user_id', $userid)->get();
        return view('seller.store.manage', compact('stores'));
    }

    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'store_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:stores,slug',
            'description' => 'required|string',
        ]);

        Store::create([
            'store_name' => $request->store_name,
            'slug' => $request->store_name,
            'description' => $request->description,
            'user_id' => Auth::user()->id, 
        ]);

        return redirect()->route('seller.store.create')->with('success', 'Store created successfully.');
    }
}
