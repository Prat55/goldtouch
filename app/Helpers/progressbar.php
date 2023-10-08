 <?php

    use App\Models\Empdetail;
    use App\Models\Order;

    function progressbar($orderid)
    {
        $orderId = Order::all();

        $emp = Empdetail::where('customer_id', "$orderid")->count();
        $empStatus = Empdetail::where('status', "RD")->count();
        $total = ($emp / $empStatus) * 100;
        return $total;
    }

    ?>
