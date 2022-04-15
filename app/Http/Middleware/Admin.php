<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Log;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check()){
            //Lấy toàn bộ thông tin của của tài khoản đăng nhập
            $user =  Auth::user();
            //Log::info(json_encode($user));
            //Share toàn bộ thông tin trên mọi view đã được đăng nhập
            view()->share('admin',$user);
            return $next($request);
        }else{
            return redirect()->route('login');
        }
       
    }
}
