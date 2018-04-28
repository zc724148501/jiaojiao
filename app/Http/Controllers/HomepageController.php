<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        return view('admin/index',['username' => $username]);
    }
}
