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

    protected function userOrder(Request $request)
    {
        $random = $this->random();
        $email = array($request->email1, $request->email2, $request->email2, $request->email3, $request->email4, $request->email5);
        $emails = json_encode($email);
        $phone = array($request->phone1, $request->phone2, $request->phone2, $request->phone3, $request->phone4, $request->phone5);
        $phones = json_encode($phone);

        $order = new Order([
            'order_id' => $random,
            'u_id' => $random,
            'cname' => $request->cname,
            'cadd' => $request->cadd,
            'cgstin' => $request->cgstin,
            'fabrics_status' => 0,
            'remark' => $request->remark,
            'email' => $emails,
            'phone' => $phones,
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

        return redirect('/order')->with('success', 'Order placed successfully');
    }

    protected function orders(Request $request)
    {
        $assignOrdersCount = Order::where('fabrics_status', 1);
        $aordersCount = Order::count();

        $orders = Order::latest();
        if (!empty($request->get('c'))) {
            $orders = $orders->where('cname', 'like', '%' . $request->get('c') . '%');
        }

        $orders =  $orders->paginate(20);
        return view('frontend.orders', compact('orders', 'assignOrdersCount', 'aordersCount'));
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
}
