<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        return view('user/logout',['username' => $username]);
    }
}
