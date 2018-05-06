<?php

namespace App\Http\Controllers\User;

use App\Model\Brand;
use App\Model\Household;
use App\Model\Models;
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
        $household = Household::where('userid', '=', $user['id'])->get();
        $data = array();
        $deadline = array();
        foreach ($household as $value) {
            $brand = Brand::where('number', '=', $value['brand'])->first();
            $type = Type::where('number', '=', $value['type'])->first();
            $model = Models::where('number', '=', $value['model'])->first();
            $data[] = $brand['brand'] . '-' . $type['type'] . '-' . $model['model'];
            $deadline[] = (time() - $value['deadline']) ? 1 : 0;
        }
        return view('user/personal', [
            'username' => $username,
            'name' => $user->name,
            'sex' => $user->sex,
            'age' => $user->age,
            'tel' => $user->tel,
            'province' => $user->province,
            'city' => $user->city,
            'address' => $user->address,
            'household' => $data,
            'deadline' => $deadline
        ]);
    }
}
