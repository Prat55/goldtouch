<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Empdetail;
use App\Models\Order;
use App\Models\Task;
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

    protected function addTasks()
    {
        $tasks = Task::latest()->paginate(10);
        return view('frontend.sendTask', compact('tasks'));
    }

    protected function addTask(Request $request)
    {
        $tasks = new Task([
            'customer_name' => $request->cusname,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);
        $tasks->save();

        if ($tasks) {
            return back()->with('success', 'Task created successfully');
        } else {
            return back()->with('error', 'Task creation failed!');
        }
    }

    protected function accept($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->fabrics_status = 2;
            $order->status = 1; //? this will change the status to processing
            $order->update();

            return back()->with('success', 'Fabric status Updated Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function reject($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->fabrics_status = 1;
            $order->status = 10;
            $order->update();

            return back()->with('success', 'Fabric status Updated Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function hold($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->fabrics_status = 3;
            $order->status = 2; //? This will change the status to On Hold
            $order->update();

            return back()->with('success', 'Fabric status Updated Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted Successfully');
    }

    protected function calender()
    {
        return view('frontend.calender');
    }
}
