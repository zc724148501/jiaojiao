<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class QueryController extends BaseController
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        $user = User::where('username', '=', $username)->first();

        $set = empty($request->get('set')) ? 1 : $request->get('set');
        if ($set == 1) {
            $order = Order::where('workerId', '=', $user->id)->get();
            $userInfo = array();
            foreach ($order as $value) {
                $user = User::where('id','=',$value->userId)->first();
                $userInfo[] = array(
                    'name' => $user->name,
                    'tel' => $user->tel,
                );
            }
        }
        return view('worker/query',['username' => $username,'active' => 3]);
    }
}
