<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,$role): Response
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        $AuthRole = Auth::user()->role;

        switch($role){
            case 'admin':
                if($AuthRole == 0){
                    return $next($request);
                }
                break;

            case 'vendor':
                if($AuthRole == 1){
                    return $next($request);
                }
                break;

            case 'customer':
                if($AuthRole == 2){
                    return $next($request);
                }
                break;
                }

            switch($AuthRole){
                    case 0:
                        return redirect()->route('admin');
                        break;
        
                    case 1:
                        return redirect()->route('vendor');
                        break;
        
                    case 2:
                        return redirect()->route('dashboard');
                        break;
                }

        return redirect()->route('login');
    }
}
