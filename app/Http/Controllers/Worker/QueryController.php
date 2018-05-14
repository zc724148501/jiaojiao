<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class QueryController extends BaseController
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        return view('worker/query',['username' => $username,'active' => 3]);
    }
}
