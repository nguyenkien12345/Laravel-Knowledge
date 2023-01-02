<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use ResetsPasswords;

class ResetPasswordController extends Controller
{

    public function showResetPasswordEmail(Request $request, $token = null){
        return view('admin.auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);
    }

    // Dùng password của admins mà ta khai báo trong config/auth.php
    protected function broker(){
        return Password::broker('admins');
    }

    protected function redirectTo()
    {
        return route('admin.dashboard');
    }

    public function resetPasswordEmail(){

    }
}
