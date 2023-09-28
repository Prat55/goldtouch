<?php

namespace App\Http\Controllers;

use App\Mail\AssignOrderMail;
use App\Mail\OrdersMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;
use PhpParser\JsonDecoder;

class UserOrderController extends Controller
{
    protected function order()
    {
        return view('frontend.customerOrder');
    }

    protected function makeUserOrder()
    {
        return view('frontend.order');
    }

    protected function random()
    {
        do {
            $orderid = random_int(100000, 999999);
        } while (Order::where("order_id", "=", $orderid)->first());

        return $orderid;
    }

    protected function makeOrder(Request $request)
    {
        if ($request->hasFile("poimg")) {
            $file = $request->file("poimg");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("poimg/"), $imageName);

            $random = $this->random();

            $order = new Order([
                'order_id' => $random,
                'cname' => $request->cname,
                'mtaker1' => $request->mtaker1 . ' ' . $request->mdatetime1,
                'mtaker2' => $request->mtaker2 . ' ' . $request->mdatetime2,
                'ponumber' => $request->pono,
                'poimg' => $imageName,
                'u_id' => $random,
                'cadd' => $request->cadd,
                'cgstin' => $request->cgstin,
                'fabrics_status' => 0,
                'cstyle_ref' => $request->styleref,
                'email' => $request->email1 . ' ' . $request->email2 . ' ' . $request->email2 . ' ' . $request->email3 . ' ' . $request->email4 . ' ' . $request->email5,
                'phone' => $request->phone1 . ' ' . $request->phone2 . ' ' . $request->phone3 . ' ' . $request->phone4 . ' ' . $request->phone5,

            ]);
            $order->save();

            $mailData = [
                'title' => 'Order Placed Details',
                'name' => "$request->cname",
                'add' => "$request->cadd",
                'gstin' => "$request->cgstin",
                'styleref' => "$request->styleref",
                'email' => "$request->email1" . ' ' . "$request->email2" . ' ' . "$request->email3" . ' ' . "$request->email4" . ' ' . "$request->email5",
                'phone' =>  "$request->phone1" . ' ' . "$request->phone2" . ' ' . "$request->phone3" . ' ' . "$request->phone4" . ' ' . "$request->phone5",
            ];

            Mail::to('pratikdesai9900@gmail.com')->cc("$request->email1", "$request->email2", "$request->email3", "$request->email4", "$request->email5")->send(new OrdersMail($mailData));
        }

        return redirect('/order')->with('success', 'Order placed successfully');
    }

    protected function customerOrder(Request $request)
    {
        $random = $this->random();

        $order = new Order([
            'order_id' => $random,
            'u_id' => $random,
            'cname' => $request->cname,
            'cadd' => $request->cadd,
            'cgstin' => $request->cgstin,
            'fabrics_status' => 0,
            'remark' => $request->remark,
            'email' => $request->email1 . ' ' . $request->email2 . ' ' . $request->email2 . ' ' . $request->email3 . ' ' . $request->email4 . ' ' . $request->email5,
            'phone' => $request->phone1 . ' ' . $request->phone2 . ' ' . $request->phone2 . ' ' . $request->phone3 . ' ' . $request->phone4 . ' ' . $request->phone5,
        ]);
        $order->save();

        $mailData = [
            'title' => 'Order Placed Details',
            'name' => "$request->cname",
            'orderId' => "$random",
            'add' => "$request->cadd",
            'gstin' => "$request->cgstin",
            'remark' => "$request->remark",
            'email' => "$request->email1" . ' ' . "$request->email2" . ' ' . "$request->email3" . ' ' . "$request->email4" . ' ' . "$request->email5",
            'phone' =>  "$request->phone1" . ' ' . "$request->phone2" . ' ' . "$request->phone3" . ' ' . "$request->phone4" . ' ' . "$request->phone5",
        ];

        Mail::to('pratikdesai9900@gmail.com')->cc("$request->email1", "$request->email2", "$request->email3", "$request->email4", "$request->email5")->send(new OrdersMail($mailData));

        return redirect('/order')->with('success', 'Order placed successfully');
    }

    protected function orders(Request $request)
    {
        $fabricStatus = Order::where('status', '9')->count();
        $aordersCount = Order::count();

        $orders = Order::latest();
        if (!empty($request->get('c'))) {
            $orders = $orders->where('cname', 'like', '%' . $request->get('c') . '%');
        }

        $orders =  $orders->paginate(20);
        return view('frontend.orders', compact('orders', 'fabricStatus', 'aordersCount'));
    }

    protected function assign(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $user = Auth::user();
        $order->assignId = $request->userID;
        $order->assignName = $request->userName;
        $order->assign_status = 0;
        $order->update();

        $mailData = [
            'title' => 'Your Assigned Order Details',
            'name' => $user->name,
            'orderid' => $order->order_id,
            'ordername' => $order->cname,
        ];

        Mail::to($user->email)->send(new AssignOrderMail($mailData));

        return redirect('orders')->with('success', 'Order assigned successfully');
    }

    protected function measurement_pending($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->status = 3;
            $order->update();

            return back()->with('success', 'Order status updated successfully to Measurement Pending');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function measurement_done($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->status = 4;
            $order->update();

            return back()->with('success', 'Order status updated successfully to Measurement Done');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function processing_done($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->status = 5;
            $order->update();

            return back()->with('success', 'Order status updated successfully to Proccessing Done');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function dispatching_pending($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->status = 6;
            $order->update();

            return back()->with('success', 'Order status updated successfully to Dispatching Pending');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function readyfordispatch_paymentpending($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->status = 7;
            $order->update();

            return back()->with('success', 'Order status updated successfully to Ready for Dispatch Payment Pending');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function ready_dispatch($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->status = 8;
            $order->update();

            return back()->with('success', 'Order status updated successfully to Ready for Dispatch');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    protected function dispatch($id)
    {
        $order = Order::findOrFail($id);

        if ($order) {
            $order->status = 9;
            $order->update();

            return back()->with('success', 'Order status updated successfully to Dispatched');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
