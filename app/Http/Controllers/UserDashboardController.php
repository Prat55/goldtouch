<?php

namespace App\Http\Controllers;

use App\Models\Empdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $empDetails = Empdetail::all();
        return view('frontend.empdatatable', compact('empDetails'));
    }

    protected function storeEmpData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tokenNo' => 'required|max:100',
            'sname' => 'required|max:100',
            'fullName' => 'required|max:200',
            'category' => 'required|max:100',
            'setOrder' => 'required|max:100',
            'status' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $emp = new Empdetail;

            $emp->tokenNo = $request->input('tokenNo');
            $emp->sname = $request->input('sname');
            $emp->fullName = $request->input('fullName');
            $emp->category = $request->input('category');
            $emp->setOrder = $request->input('setOrder');
            $emp->status = $request->input('status');

            $emp->save();
            return response()->json([
                'status' => 200,
                'message' => 'Employee Added Successfully',
            ]);
        }
    }
}
