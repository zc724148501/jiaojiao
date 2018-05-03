<?php

namespace App\Http\Controllers\User;

use App\Model\Brand;
use App\Model\Household;
use App\Model\Models;
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
        return view('user/setting', [
            'username' => $username,
            'msg' => '',
            'name'     => $user->name,
            'sex'      => $user->sex,
            'age'      => $user->age,
            'tel'      => $user->tel,
            'province' => $user->province,
            'city'     => $user->city,
            'address'     => $user->address,
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
            return view('user/setting', [
                'username' => $username,
                'msg'     => $msg,
                'name'     => $user->name,
                'sex'      => $user->sex,
                'age'      => $user->age,
                'tel'      => $tel,
                'province' => $user->province,
                'city'     => $user->city,
                'address'  => $user->address,
            ]);
        }
        else {
            $msg = '';
            $user->update(['name' => $name, 'sex' => $sex, 'age' => $age, 'tel' => $tel, 'province' => $province, 'city' => $city, 'address' => $address]);
            return view('user/setting', [
                'username' => $username,
                'msg' => $msg,
                'name'     => $user->name,
                'sex'      => $user->sex,
                'age'      => $user->age,
                'tel'      => $user->tel,
                'province' => $user->province,
                'city'     => $user->city,
                'address'  => $user->address,
            ]);
        }
    }
}
