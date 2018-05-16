<?php

namespace App\Http\Controllers\User;

use App\Model\Fault;
use App\Model\Household;
use App\Model\Brand;
use App\Model\Order;
use App\Model\Type;
use App\Model\Models;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class AppointmentController extends BaseController
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        $user = User::where('username', '=', $username)->first();
        $household = Household::where('userid', '=', $user['id'])->get();
        $data = array();
        $over = array();
        foreach ($household as $value) {
            if ((time() - $value['deadline']) < 0) {
                $brand = Brand::where('number', '=', $value['brand'])->first();
                $type = Type::where('number', '=', $value['type'])->first();
                $model = Models::where('number', '=', $value['model'])->first();
                $data[] = array('id' => $value['id'], 'household' => $brand['brand'] . '-' . $type['type'] . '-' . $model['model']);
            } else {
                $brand = Brand::where('number', '=', $value['brand'])->first();
                $type = Type::where('number', '=', $value['type'])->first();
                $model = Models::where('number', '=', $value['model'])->first();
                $over[] = array('id' => $value['id'], 'household' => $brand['brand'] . '-' . $type['type'] . '-' . $model['model']);
            }
        }
        $time = date('Y-m-d m:i', time());
        $complete = 1;
        if (empty($user['name']) || empty($user['tel']) || empty($user['address'])) {
            $complete = 0;
        }
        return view('user/appointment', [
            'username' => $username,
            'user' => $user,
            'active' => 2,
            'complete' => $complete,
            'household' => $data,
            'over' => $over,
            'time' => $time,
        ]);
    }

    public function select(Request $request)
    {
        $id = $request->get('id');
        $household = Household::where('id', '=', $id)->first();
        $faultType = Fault::where(['brandNum' => $household['brand'], 'status' => 'type', 'typeNum' => $household['type']])->get();
        $faultModel = Fault::where(['brandNum' => $household['brand'], 'status' => 'model', 'modelNum' => $household['model']])->get();
        return array('type' => $faultType, 'model' => $faultModel);
    }

    public function submit(Request $request)
    {
        if ($request->isMethod('post')) {
            $householdId = $request->get('household');
            $fault = $request->get('fault');
            $describe = $request->get('describe');
            $startTime = $request->get('startTime');
            $endTime = $request->get('endTime');
            $username = $request->session()->get('username');
            $household = Household::where('id', '=', $householdId)->first();
            $user = User::where('username', '=', $username)->first();
            $worker = User::join('worker', function ($join) {
                $join->on('users.id', '=', 'worker.userId');
            })->where(['province' => $user['province'], 'city' => $user['city'], 'flag' => 2, 'brandNum' => $household->brand, 'typeNum' => $household->type])->first();

            if (empty($worker)) {
                return 0;
            } else {
                $order = new Order();

                $order->create([
                    'household' => $household,
                    'fault' => $fault,
                    'describe' => $describe,
                    'startTime' => substr($startTime, 0, 10),
                    'endTime' => substr($endTime, 0, 10),
                    'userId' => $user->id,
                    'workerId' => $worker->userId,
                ]);
                return 1;
            }
        }
        return 0;
    }
}
