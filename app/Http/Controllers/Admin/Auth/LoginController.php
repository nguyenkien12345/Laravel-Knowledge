<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }

    // Dùng guard của admin mà ta khai báo trong config/auth.php
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm(){
        return view ('admin.auth.login');
    }

    public function login(){

    }

    protected function redirectTo()
    {
        return route('admin.dashboard');
    }

    protected function loggedOut(Request $request){
        return $request->wantsJson()
        ? new Response('',204)
        : redirect()->route('admin.login');
    }
}
