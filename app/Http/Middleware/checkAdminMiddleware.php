<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class checkAdminMiddleware
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
        // Nếu người dùng đã đăng nhập
        if(Auth::check()){
            // Nếu người dùng là admin
            if(Auth::user()->is_admin){
                 return $next($request);
            }
            return redirect()->route('show-form-login');
        }
        // Người dùng chưa đăng nhập
        return redirect()->route('show-form-login');
    }
}
