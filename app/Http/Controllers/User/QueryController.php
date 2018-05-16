<?php

namespace App\Http\Controllers\User;

use App\Model\Fault;
use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class QueryController extends BaseController
{
    public function index(Request $request, $set)
    {
        $username = $request->session()->get('username');
        $user = User::where('username', '=', $username)->first();

        if ($set == 1) {
            $order = Order::where('userId', '=', $user->id)->get();
            $workerInfo = array();
            foreach ($order as $value) {
                $worker = User::where('id', '=', $value->workerId)->first();
                if ($value->fault == 0) {
                    $faultName = '其他';
                }
                else {
                    $fault = Fault::where('id', '=', $value->fault)->first();
                    $faultName = $fault->fault;
                }
                $workerInfo[] = array(
                    'name' => $worker->name,
                    'tel'  => $worker->tel,
                );
            }
        }
        elseif ($set == 2) {
            $order = Order::where(['userId' => $user->id, 'status' => 0])->get();
            $workerInfo = array();
            foreach ($order as $value) {
                $worker = User::where('id', '=', $value->workerId)->first();
                if ($value->fault == 0) {
                    $faultName = '其他';
                }
                else {
                    $fault = Fault::where('id', '=', $value->fault)->first();
                    $faultName = $fault->fault;
                }
                $workerInfo[] = array(
                    'name' => $worker->name,
                    'tel'  => $worker->tel,
                );
            }
        }
        else {
            $order = Order::where(['userId' => $user->id, 'status' => 1])->get();
            $workerInfo = array();
            foreach ($order as $value) {
                $worker = User::where('id', '=', $value->workerId)->first();
                if ($value->fault == 0) {
                    $faultName = '其他';
                }
                else {
                    $fault = Fault::where('id', '=', $value->fault)->first();
                    $faultName = $fault->fault;
                }
                $workerInfo[] = array(
                    'name' => $worker->name,
                    'tel'  => $worker->tel,
                );
            }
        }
        if (empty($faultName)) {
            $faultName = '';
        }

        return view('user/query', [
            'username' => $username,
            'set'      => $set,
            'order'    => $order,
            'worker'   => $workerInfo,
            'fault'    => $faultName,
            'active'   => 3
        ]);
    }
}
