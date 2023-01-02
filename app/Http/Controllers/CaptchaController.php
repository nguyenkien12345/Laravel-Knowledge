<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{

    public function index(){
        return view('captcha.index');
    }

    public function reloadCaptcha(){
        return response()->json([
            'captcha' => captcha_img('mini'),
            'status' => true,
            'message' => 'Success'
        ]);
    }

    public function sendDataCaptcha(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha', // captcha: kiểm tra xem captcha có trùng khớp không
        ]);

        return response()->json([
            'data' => [],
            'status' => true,
            'message' => 'Success'
        ]);
    }

}
