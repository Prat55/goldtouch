<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Exports\EmpdetailExport;


class CsvImportController extends Controller
{
    public function import(Request $request)
    {
        request()->validate([
            'excel' => 'required',
            'cusid' => 'required',
        ]);
        $customerId = $request->cusid;
        Excel::import(new EmployeeImport($customerId), $request->file('excel'));
        return back()->with('massage', 'User Imported Successfully');
    }


    public function export(Request $request)
    {
        $customerId = $request->customerId;
        return Excel::download(new EmpdetailExport($customerId), "empdetails_{$customerId}.csv");
    }
}
