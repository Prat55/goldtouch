<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    protected function userinfo(Request $request)
    {
        $users = User::latest();

        if (!empty($request->get('name'))) {
            $orders = $users->where('name', 'like', '%' . $request->get('name') . '%');
        }

        $users1 = User::where('role', '1')->count();
        $users2 = User::where('role', '2')->count();
        $users =  $users->paginate(10);
        return view('frontend.userinfo', compact('users', 'users1', 'users2'));
    }

    protected function empData()
    {
        return view('frontend.empdatatable');
    }
}
