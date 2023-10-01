<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CsvImportController extends Controller
{
    // public function import(Request $request)
    // {
    //     // ? Validator is validate the file is in correct format or not
    //     $request->validate([
    //         'excel' => 'required',
    //         'cusid' => 'required',
    //     ]);

    //     $file = $request->file('csv_file');
    //     $customerId = $request->cusid;
    //     $filePath = $file->getRealPath();
    //     $data = array_map('str_getcsv', file($filePath));

    //     // ?Shifting one row assuming header is there
    //     $headers = array_shift($data);

    //     //! Loop through the CSV data and insert records into the employee details database
    //     foreach ($data as $row) {
    //         $record = array_combine($headers, $row);
    //         $key = 1;
    //         // Create or update a user record
    //         Empdetail::updateOrCreate(
    //             ['customer_id' => $customerId],
    //             [
    //                 'tokenNo' => $record['Token No'],
    //                 'sname' => $key,
    //                 'fullName' => $record['Full Name'],
    //                 'category' => $record['Category'],
    //                 'setOrder' => $record['Set Order'],
    //                 'status' => $record['MEASURMENT PENDING']
    //             ]
    //         );
    //         $key++;
    //     }

    //     // this can delete the uploaded file
    //     Storage::delete($filePath);

    //     // Redirect back with a success message
    //     return redirect()->back()->with('success', 'Employess Added Successfully');
    // }

    public function import(Request $request)
    {
        request()->validate([
            'excel' => 'required|mimes:xlx,xls,xlsx,csv|max:2048',
            'cusid' => 'required',
        ]);

        $customerId = $request->cusid;
        // ? import excel file to database
        Excel::import(new EmployeeImport($customerId), $request->file('excel'));
        return back()->with('massage', 'User Imported Successfully');
    }
}
