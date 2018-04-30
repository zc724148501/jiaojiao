<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        return view('user/personal',['username' => $username]);
    }
}
