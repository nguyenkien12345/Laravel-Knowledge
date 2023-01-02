<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    // CHÚ THÍCH / Giải Thích
    // Dùng để xác thực lại người dùng sau 1 khoảng thời gian nhất định. Cứ Sau khoảng thời gian nhất định đó chúng ta phải đăng nhập lại để sử dụng tiếp hệ thống
    // (Mặc định là 3 tiếng => Cái khoảng thời gian này sẽ nằm trong config/auth.php ('password_timeout' => 10800 (tương đương 3 tiếng)))

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
