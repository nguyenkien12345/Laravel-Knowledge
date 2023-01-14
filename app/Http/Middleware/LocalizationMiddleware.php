<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationMiddleware
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
        // Lấy ra ngôn ngữ đang được set cho trang web thông qua seesion.
        // Nếu không tồn tại giá trị language trong session thì lấy thông qua biến language trong file app
        $language = Session::get('language', config('app.locale'));
        // Set lại giá trị cho ngôn ngữ mặc định hiển thị ra website
        App::setLocale($language);
        return $next($request);
    }
}
