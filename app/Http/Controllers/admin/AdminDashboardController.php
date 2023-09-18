<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected function order()
    {
        return view('frontend.order');
    }

    protected function index()
    {
        $countOrder = Order::all();
        return view('frontend.index', compact('countOrder'));
    }
}
