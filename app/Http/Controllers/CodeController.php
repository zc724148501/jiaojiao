<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('login',['except' => 'captcha']);
    }

    public function captcha()
    {
        $builder = new CaptchaBuilder();
        $builder->build(220, 50);
        $phrase = $builder->getPhrase();

        Session::flash('captcha', $phrase);
        ob_clean();
        return response($builder->output())->header('Content-type', 'image/jpeg');
    }
}
