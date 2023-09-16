<?php

namespace App\Http\Controllers;

use App\Mail\OrdersMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserOrderController extends Controller
{
    protected function order()
    {
        return view('frontend.customerOrder');
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

            $order = new Order([
                'order_id' => $this->random(),
                'cname' => $request->cname,
                'mtaker1' => $request->mtaker1 . ' ' . $request->mdatetime1,
                'mtaker2' => $request->mtaker2 . ' ' . $request->mdatetime2,
                'ponumber' => $request->pono,
                'poimg' => $imageName,
                'u_id' => Auth::user()->id,
                'cadd' => $request->cadd,
                'cgstin' => $request->cgstin,
                'fabrics_status' => 0,
                'cstyle_ref' => $request->styleref,
                'email' => $request->email1 . ' ' . $request->email2 . ' ' . $request->email2 . ' ' . $request->email3 . ' ' . $request->email4 . ' ' . $request->email5,
                'phone' => $request->phone1 . ' ' . $request->phone2 . ' ' . $request->phone3 . ' ' . $request->phone4 . ' ' . $request->phone5,

            ]);
            $order->save();

            $mailData = [
                'title' => 'Order Placed',
                'name' => "$request->cname",
                'add' => "$request->cadd",
                'gstin' => "$request->cgstin",
                'styleref' => "$request->styleref",
                'email' => "$request->email1" . ',' . "$request->email2" . ',' . "$request->email3" . ',' . "$request->email4" . ',' . "$request->email5",
                'phone' =>  "$request->phone1" . ',' . "$request->phone2" . ',' . "$request->phone3" . ',' . "$request->phone4" . ',' . "$request->phone5",
            ];

            Mail::to('pratikdesai9900@gmail.com')->cc("$request->email1", "$request->email2", "$request->email3", "$request->email4", "$request->email5")->send(new OrdersMail($mailData));
        }

        return redirect('/order')->with('Order placed successfully');
    }

    protected function orders(Request $request)
    {
        $uordersCount = Order::where('u_id', Auth::user()->id)->count();
        $aordersCount = Order::count();

        $orders = Order::latest();
        if (!empty($request->get('c'))) {
            $orders = $orders->where('cname', 'like', '%' . $request->get('c') . '%');
        }

        $orders =  $orders->paginate(10);
        return view('frontend.orders', compact('orders', 'uordersCount', 'aordersCount'));
    }
}
