<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Empdetail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    protected function sendTask()
    {
        $users = User::all();
        $orders = Order::all();
        return view('frontend.sendTask', compact('users', 'orders'));
    }

    protected function sendorderTask(Request $request, $order_id)
    {
        $validator = Validator::make($request->all(), [
            'taskOrderId' => 'required|max:100',
            'tdue' => 'required|max:100',
            'taskUser' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $emp = Empdetail::find($order_id);
            if ($emp) { 
                $emp->tokenNo = $request->input('tokenNo');
                $emp->sname = $request->input('sname');
                $emp->fullName = $request->input('fullName');
                $emp->category = $request->input('category');
                $emp->setOrder = $request->input('setOrder');
                $emp->status = $request->input('status');
                $emp->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Updated Successfully',
                ]);
            } else {

                return response()->json([
                    'status' => 404,
                    'message' => "Employee doesn't exist",
                ]);
            }
        }
    }
}
