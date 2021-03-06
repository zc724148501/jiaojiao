<?php

namespace App\Http\Controllers\User;

use App\Model\Brand;
use App\Model\Household;
use App\Model\Models;
use App\Model\Type;
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
        return view('user/setting', ['username' => $username, 'msg' => '', 'name' => $user->name, 'sex' => $user->sex, 'age' => $user->age, 'tel' => $user->tel, 'province' => $user->province, 'city' => $user->city, 'address' => $user->address,'active' => 5]);
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
            return view('user/setting', ['username' => $username, 'msg' => $msg, 'name' => $user->name, 'sex' => $user->sex, 'age' => $user->age, 'tel' => $tel, 'province' => $user->province, 'city' => $user->city, 'address' => $user->address,'active' => 5]);
        } else {
            $msg = '';
            $user->update(['name' => $name, 'sex' => $sex, 'age' => $age, 'tel' => $tel, 'province' => $province, 'city' => $city, 'address' => $address]);
            return redirect('user/setting')->with(['username' => $username, 'msg' => $msg, 'name' => $user->name, 'sex' => $user->sex, 'age' => $user->age, 'tel' => $user->tel, 'province' => $user->province, 'city' => $user->city, 'address' => $user->address,'active' => 5]);
        }
    }

    public function setHousehold(Request $request)
    {
        $input = array();
        $username = $request->session()->get('username');
        $householdNum = $request->all();
        $user = User::where('username', '=', $username)->first();
        foreach ($householdNum as $key => $value) {
            $household = Household::where('number', '=', $value)->first();
            if (empty($household)) {
                $input[$key] = array('input' => $value, 'msg' => 'none');
            } elseif (!empty($household['userid']) && $household['userid'] != $user['id']) {
                $input[$key] = array('input' => $value, 'msg' => 'exist');
            } elseif ($household['userid'] == $user['id']) {
                $brand = Brand::where('number', '=', $household['brand'])->first();
                $type = Type::where('number', '=', $household['type'])->first();
                $model = Models::where('number', '=', $household['model'])->first();
                $input[$key] = array('input' => $value, 'msg' => $brand['brand'] . '-' . $type['type'] . '-' . $model['model']);
            } else {
                Household::where('number', '=', $value)->update(['userid' => $user['id']]);
                $brand = Brand::where('number', '=', $household['brand'])->first();
                $type = Type::where('number', '=', $household['type'])->first();
                $model = Models::where('number', '=', $household['model'])->first();
                $input[$key] = array('input' => $value, 'msg' => $brand['brand'] . '-' . $type['type'] . '-' . $model['model']);
            }
        }
        return view('user/setting')->with(['username' => $username, 'msg' => '', 'name' => $user->name, 'sex' => $user->sex, 'age' => $user->age, 'tel' => $user->tel, 'province' => $user->province, 'city' => $user->city, 'address' => $user->address,'household' => $input,'active' => 5]);
    }
}
