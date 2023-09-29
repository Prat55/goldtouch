<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Empdetail;
use App\Models\Event;
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
        $pendingOrder = Order::where('status', '0');
        $completedOrder = Order::where('status', '9');
        return view('frontend.index', compact('countOrder', 'pendingOrder', 'completedOrder'));
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
        $tasks = array();
        $events = Event::all();
        foreach ($events as $ev) {
            $tasks[] = [
                'title' => $ev->title,
                'start' => $ev->start_date,
                'end' => $ev->end_date,
            ];
        }
        return view('frontend.calender', ['tasks' => $tasks]);
    }

    protected function calender_event(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:198',
            'start_date' => 'required|max:100',
            'end_date' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $events = new Event([
                'title' => $request->input('title'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ]);
            $events->save();

            if ($events) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Added Successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'errors' => 'Something went wrong!',
                ]);
            }
        }
    }

    protected function finished($id)
    {
        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks->status = 2;
            $tasks->update();

            return back()->with('success', 'Change Status to Finished');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function cancelled($id)
    {
        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks->status = 3;
            $tasks->update();

            return back()->with('success', 'Change Status to Cancelled!');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function onhold($id)
    {
        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks->status = 4;
            $tasks->update();

            return back()->with('success', 'Change Status to Hold');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function process($id)
    {
        $tasks = Task::findOrFail($id);

        if ($tasks) {
            $tasks->status = 1;
            $tasks->update();

            return back()->with('success', 'Change Status to On Process');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
