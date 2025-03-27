<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        return view('seller.dashbord');
        
    }

    public function orderhistory()
    {
        return view('seller.orderhistory');
        
    }
}

