<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        return view('seller.dashboard');
        
    }

    public function orderhistory()
    {
        return view('seller.orderhistory');
        
    }
}

