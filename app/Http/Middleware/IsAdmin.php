<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Session;
use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->isAdmin()) {
           return $next($request);
            
        }
        else{    
            Session::flash('error', 'Sorry you dont have administrative permissions to access this page');
            return redirect()->back();
        }
        return redirect()->intended('admin/dashboard');
    }




}
