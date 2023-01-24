<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckOnlineUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Để lưu dữ liệu vào bộ nhớ cache thì sử dụng phương thức put trong façade cache
        // Cache::put('key','value',$minutes);
        if(Auth::check()){
            $expireAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online-' . Auth::user()->user_id, true, $expireAt);
        }
        return $next($request);
    }
}
