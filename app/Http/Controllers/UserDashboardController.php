<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    protected function userinfo(){
        $users = User::all();

        return view('frontend.userinfo', compact('users'));
    }
}
