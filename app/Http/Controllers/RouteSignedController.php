<?php

namespace App\Http\Controllers;

use App\Models\Empdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

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

    protected function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tokenNo' => 'required|max:100',
            'sname' => 'required|max:100',
            'fullName' => 'required|max:200',
            'category' => 'required|max:100',
            'setOrder' => 'required|max:100',
            'status' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $emp = Empdetail::find($id);
            if ($emp) {

                $emp->tokenNo = $request->input('tokenNo');
                $emp->sname = $request->input('sname');
                $emp->fullName = $request->input('fullName');
                $emp->category = $request->input('category');
                $emp->setOrder = $request->input('setOrder');
                $emp->status = $request->input('status');
                $emp->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Updated Successfully',
                ]);
            } else {
                
                return response()->json([
                    'status' => 404,
                    'message' => "Employee doesn't exist",
                ]);
            }
        }
    }

    protected function delete($id)
    {
        $emp = Empdetail::findOrFail($id);
        $emp->delete();

        return back()->with('success', 'Employee deleted successfully');
    }
}
