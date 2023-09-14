<?php

namespace App\Http\Controllers;

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
}
