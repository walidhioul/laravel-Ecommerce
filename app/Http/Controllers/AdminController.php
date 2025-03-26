<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function setting()
    {
        return view('admin.setting');
    }

    public function manage_user()
    {
        return view('admin.manager.user');
    }


    public function manage_stores()
    {
        return view('admin.manager.stores');
    }

    public function cart_history()
    {
        return view('admin.cart.history');
    }

    public function order_history()
    {
        return view('admin.order.history');
    }
}
