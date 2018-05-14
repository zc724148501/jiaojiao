<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class HomepageController extends BaseController
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        return view('worker/index',['username' => $username,'active' => 1]);
    }
}
