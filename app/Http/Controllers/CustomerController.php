<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.profile');
    }

    public function history()
    {
        return view('customer.history');
    }

    public function payment()
    {
        return view('customer.payment');
    }

    public function affilate()
    {
        return view('customer.affilate');
    }
}
