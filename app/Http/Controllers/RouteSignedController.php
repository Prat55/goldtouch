<?php

namespace App\Http\Controllers;

use App\Models\Empdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class RouteSignedController extends Controller
{
    protected function sendTempRoute()
    {
        $url = URL::temporarySignedRoute('share-entry', now()->addMinutes(20), [
            'cid' => 5
        ]);

        $customers = User::all();
        return view('frontend.sendTempRoute', compact('customers', 'url'));
    }

    protected function sendMailRoute(Request $request)
    {
        $url = URL::temporarySignedRoute('share-entry', now()->addMinutes(20), [
            'cid' => $request->cid
        ]);
    }

    protected function edit($id)
    {
        $employee = Empdetail::find($id);

        if ($employee) {

            return response()->json([
                'status' => 200,
                'employee' => $employee,
            ]);
        } else {

            return response()->json([
                'status' => 404,
                'message' => "Employee doesn't exist",
            ]);
        }
    }

    protected function delete(Request $request, $id)
    {
        $emp = Empdetail::findOrFail($id);
        $emp->delete();
        return back()->with('success', 'Employee deleted successfully');
    }
}
