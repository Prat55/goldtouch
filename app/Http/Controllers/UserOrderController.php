<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    protected function order()
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

        $order = new Order([
            'order_id' => $this->random(),
            'cname' => $request->cname,
            'cadd' => $request->cadd,
            'cgstin' => $request->cgstin,
            'cstyle_ref' => $request->styleref,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'email3' => $request->email3,
            'email4' => $request->email4,
            'email5' => $request->email5,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'phone3' => $request->phone3,
            'phone4' => $request->phone4,
            'phone5' => $request->phone5,
        ]);
        $order->save();

        return redirect('/order');
    }

    protected function orders(Request $request)
    {
        $orders = Order::latest();
        if (!empty($request->get('keyword'))) {
            $orders = $orders->where('cname', 'like', '%' . $request->get('keyword') . '%');
        }

        $orders =  $orders->paginate(10);
        return view('frontend.orders', compact('orders'));
    }
}
