<?php

namespace App\Http\Controllers;

use App\Exports\EventExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportEventController extends Controller
{
    public function export()
    {
        return Excel::download(new EventExport, 'events.csv');
    }
}
