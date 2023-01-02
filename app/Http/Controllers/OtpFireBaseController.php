<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpFireBaseController extends Controller
{
    public function otpFirebase(){
        return view('otp.index');
    }
}
