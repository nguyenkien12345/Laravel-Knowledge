<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Dùng password của admins mà ta khai báo trong config/auth.php
    protected function broker(){
        return Password::broker('admins');
    }

    public function showLinkResetPasswordEmail(){
        return view('admin.auth.passwords.email');
    }

    public function sendLinkResetPasswordEmail(){

    }
}
