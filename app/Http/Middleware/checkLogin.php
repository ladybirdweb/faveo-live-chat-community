<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class checkLogin
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
        if (Session::has('myLang')) {
            App::setLocale(Session::get('myLang'));
        }

        if (Auth::check()) {
            if(session::has('token')) {
                if (Auth::user()->role == 'admin') {
                    return redirect('admin');
                }
                if (Auth::user()->role == 'agent') {
                    return redirect('agent');
                }
            }
        }
        return $next($request);
    }
}
