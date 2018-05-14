<?php

namespace App\Http\Controllers\Worker;

use App\Model\Brand;
use App\Model\Models;
use App\Model\Type;
use App\Model\Worker;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\User;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends BaseController
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        $user = User::where('username', '=', $username)->first();
        $worker = Worker::where('userId', '=', $user->id)->first();
        $brandAll = Brand::all();
        $brand = Brand::where('number', '=', $worker->brandNum)->first();
        $typeAll = Type::all();
        $type = Type::where('number', '=', $worker->typeNum)->first();
        return view('worker/setting', [
            'username' => $username,
            'msg'      => '',
            'name'     => $user->name,
            'sex'      => $user->sex,
            'age'      => $user->age,
            'tel'      => $user->tel,
            'province' => $user->province,
            'city'     => $user->city,
            'address'  => $user->address,
            'active'   => 5,
            'brand'    => empty($brand->number) ? 0 : $brand->number,
            'brandAll' => $brandAll,
            'type'     => empty($type->number) ? 0 : $type->number,
            'typeAll'  => $typeAll,
        ]);
    }

    public function setInformation(Request $request)
    {
        $username = $request->session()->get('username');
        $name = $request->get('name');
        $sex = $request->get('sex');
        $age = $request->get('age');
        $tel = $request->get('tel');
        $province = $request->get('province');
        $city = $request->get('city');
        $address = $request->get('address');
        $user = User::where('username', '=', $username)->first();
        if (!preg_match("/^1[34578]{1}\d{9}$/", $tel)) {
            $msg = '错误的手机号格式';
            return view('worker/setting', [
                'username' => $username,
                'msg'      => $msg,
                'name'     => $user->name,
                'sex'      => $user->sex,
                'age'      => $user->age,
                'tel'      => $tel,
                'province' => $user->province,
                'city'     => $user->city,
                'address'  => $user->address,
                'active'   => 5
            ]);
        }
        else {
            $msg = '';
            $user->update(['name' => $name, 'sex' => $sex, 'age' => $age, 'tel' => $tel, 'province' => $province, 'city' => $city, 'address' => $address]);
            return redirect('worker/setting')->with([
                                                        'username' => $username,
                                                        'msg'      => $msg,
                                                        'name'     => $user->name,
                                                        'sex'      => $user->sex,
                                                        'age'      => $user->age,
                                                        'tel'      => $user->tel,
                                                        'province' => $user->province,
                                                        'city'     => $user->city,
                                                        'address'  => $user->address,
                                                        'active'   => 5
                                                    ]);
        }
    }

    public function setHousehold(Request $request)
    {
        $brand = $request->get('brand');
        $type = $request->get('type');
        $username = $request->session()->get('username');
        $user = User::where('username', '=', $username)->first();
        $worker = Worker::where('userId', '=', $user->id)->first();
        if (empty($worker)) {
            Worker::create(['userId' => $user->id, 'brandNum' => $brand, 'typeNum' => $type]);
        }
        else {
            $worker->update(['brandNum' => $brand,'typeNum' => $type]);
        }
    }
}
