<?php

namespace App\Http\Controllers\Worker;

use App\Model\Brand;
use App\Model\Household;
use App\Model\Models;
use App\Model\Type;
use App\Model\Worker;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\User;

class PersonalController extends BaseController
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username');
        $user = User::where('username', '=', $username)->first();
        $worker = Worker::where('userId','=',$user->id)->first();
        $brand = Brand::where('number','=',$worker->brandNum)->first();
        $type = Type::where('number','=',$worker->typeNum)->first();
        return view('worker/personal', [
            'username' => $username,
            'name' => $user->name,
            'sex' => $user->sex,
            'age' => $user->age,
            'tel' => $user->tel,
            'province' => $user->province,
            'city' => $user->city,
            'address' => $user->address,
            'brand' => !empty($brand->brand) ? $brand->brand : null,
            'type' => !empty($type->type) ? $type->type : null,
            'active' => 4
        ]);
    }
}
