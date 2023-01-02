<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // CHÚ THÍCH / Giải Thích
    // Khi ta nhấn Forgot Your Password? => Nó sẽ sinh ra 1 record ghi nhận trong bảng password_resets
    // => Nếu ta xóa record này trên db thì link reset password sẽ mất hiệu lực (không còn tác dụng nữa).
    // Khi ta reset password xong thì tự động record tương ứng trong bảng password_resets sẽ bị xóa luôn

    use SendsPasswordResetEmails;
}
