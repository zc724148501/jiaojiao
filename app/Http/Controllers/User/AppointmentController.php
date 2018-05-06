<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class AppointmentController extends BaseController
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        return view('user/appointment',['username' => $username,'active' => 2]);
    }
}
