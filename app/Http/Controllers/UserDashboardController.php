<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    protected function order()
    {
        return view('frontend.order');
    }
}
