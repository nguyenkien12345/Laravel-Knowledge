<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class OtpController extends Controller
{
    public $successStatus = 200;

    public function index(){
        return view('auth.login_with_otp');
    }

    public function sendOtp(Request $request){
        $otp = rand(1000,9999);
        Log::info("otp = " . $otp);
        $user = User::where('mobile', '=' ,$request->mobile)->update(['otp' => $otp]);
        return response()->json([$user],200);
    }

    public function loginWithOtp(Request $request){
        $user  = User::where([['mobile', '=', $request->mobile],['otp', '=',$request->otp]])->first();
        if( $user){
            Auth::login($user, true);
            User::where('mobile', '=',$request->mobile)->update(['otp' => null]);
            return view('home');
        }
        else{
            return Redirect::back ();
        }
    }
}
