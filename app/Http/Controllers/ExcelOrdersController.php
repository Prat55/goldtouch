<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\src\Facades\Excel;
use App\Imports\OrdersImport;

class ExcelOrdersController extends Controller
{
    public function import()
    {
        Excel::import(new OrdersImport, 'users.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
