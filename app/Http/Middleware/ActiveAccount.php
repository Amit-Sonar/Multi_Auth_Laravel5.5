<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ActiveAccount
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
        $guard=null;
        $route=null;
         if(Auth::guard('admin')->check())
        {
            $guard='admin';
            $route='admin.ActivateAccountView';
            
        }elseif(Auth::guard('web')->check())
        {
            $guard='web';
            $route='ActivateAccountView';
        }

        if(Auth::guard($guard)->check())
        {
            $verified=Auth::guard($guard) ->user()->verified;
            $email_token = Auth::guard($guard)->user()->email_token;
            if 
            ($verified==0 && $email_token != null) 
            {

                
               return redirect()->route($route);
            }else{
                               
                return $next($request);
            }     
            
        }
        

    }
}
