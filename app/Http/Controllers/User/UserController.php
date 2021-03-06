<?php

namespace App\Http\Controllers\User;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\BaseController;
use Cookie;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        $msg = $request->get('msg');
        return view('user/login', ['msg' => $msg]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        $cookie = Cookie::forget('login');
        return response()->view('user/login')->withCookie($cookie);
    }

    public function register()
    {
        return view('user/register');
    }

    public function checkLogin(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $captcha = $request->get('code');
        if ($username == '') {
            $msg = '用户名不能为空';
            return view('user/login')->with(['msg' => $msg]);
        } elseif ($password == '') {
            $msg = '密码不能为空';
            return view('user/login')->with(['msg' => $msg, 'username' => $username]);
        } elseif ($captcha == '') {
            $msg = '验证码不能为空';
            return view('user/login')->with(['msg' => $msg, 'username' => $username]);
        } elseif ($captcha != $request->session()->get('captcha')) {
            $msg = '验证码不正确';
            return view('user/login')->with(['msg' => $msg, 'username' => $username]);
        } else {
            $user = User::where('username', '=', $username)->first();
            if (empty($user)){
                $msg = '用户名不存在';
                return view('user/login')->with(['msg' => $msg]);
            }
            elseif ($user->password != strtoupper(substr(md5($password), 8, 16))) {
                $msg = '密码不正确';
                return view('user/login')->with(['msg' => $msg, 'username' => $username]);
            } else {
                $remember = $request->get('remember');
                if (isset($remember)) {
                    $cookie = Cookie::make('login', $username, 43200);
                } else {
                    $cookie = Cookie::forget('login');
                }
                $request->session()->put('username', $username);
                $request->session()->put('flag', $user->flag);
                return response()->view('locationLogin',['flag' => $user->flag])->withCookie($cookie);
            }
        }
    }

    public function checkRegister(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $re_password = $request->get('re_password');
        $captcha = $request->get('code');
        if ($username == '') {
            $msg = '用户名不能为空';
            return view('user/register')->with(['msg' => $msg]);
        } elseif (strlen($username) > 20 || strlen($username) < 4) {
            $msg = '用户名必须是4-20个字符之间';
            return view('user/register')->with(['msg' => $msg, 'username' => $username]);
        } elseif ($password == '') {
            $msg = '密码不能为空';
            return view('user/register')->with(['msg' => $msg, 'username' => $username]);
        } elseif (strlen($password) > 20 || strlen($password) < 6) {
            $msg = '密码必须是4-20个字符之间';
            return view('user/register')->with(['msg' => $msg, 'username' => $username]);
        } elseif ($re_password == '') {
            $msg = '请再次输入密码';
            return view('user/register')->with(['msg' => $msg, 'username' => $username]);
        } elseif ($password != $re_password) {
            $msg = '两次密码输入不一致';
            return view('user/register')->with(['msg' => $msg, 'username' => $username]);
        } elseif ($captcha == '') {
            $msg = '验证码不能为空';
            return view('user/register')->with(['msg' => $msg, 'username' => $username]);
        } elseif ($captcha != $request->session()->get('captcha')) {
            $msg = '验证码不正确';
            return view('user/register')->with(['msg' => $msg, 'username' => $username]);
        } elseif (!empty(User::where('username', '=', $username)->first())) {
            $msg = '用户名已存在，请重新输入';
            return view('user/register')->with(['msg' => $msg]);
        } else {
            User::create(['username' => $username, 'password' => strtoupper(substr(md5($password), 8, 16)), 'create_time' => time()]);
            return view('location');
        }
    }
}
