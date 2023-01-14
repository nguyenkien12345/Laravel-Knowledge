<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictIpAddressMiddleware
{

    // Danh sách địa chỉ các ip bị chặn
    public $restrictedIpAddressList = ['102.129.158.0', '102.129.161.0', '192.168.0.3', '100.43.96.0'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra địa chỉ ip có bị chặn không
        if(\in_array($request->ip(), $this->restrictedIpAddressList)){
            // Nếu là địa chỉ api (có prefix api)
            if($request->is('api/*')){
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry. You are not allowed to access this site'
                ]);
            }
            // Nếu không phải là địa chỉ api (không có prefix api) (Nếu chỉ trả về mỗi view thì sẽ xuất hiện lỗi Call to a member function setCookie() on null)
            return response()->view('block');
        }
        return $next($request);
    }
}
