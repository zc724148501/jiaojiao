<?php

namespace App\Http\Controllers\User;

use App\Model\Brand;
use App\Model\Household;
use App\Model\Model;
use App\Model\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\User;

class PersonalController extends BaseController
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        $user = User::where('username', '=', $username)->first();
        $household = Household::where('uid', '=', $user['id']);
        $data = array();
        foreach ($household as $value) {
            $brand = Brand::where('number', '=', $household['brand']);
            $type = Type::where('number', '=', $household['type']);
            $model = Model::where('number', '=', $household['model']);
            $data[] = array(
                'brand' => $brand,
                'type' => $type,
                'model' => $model,
            );
        }
        return view('user/personal', [
            'username' => $username,
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
