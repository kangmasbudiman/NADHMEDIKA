<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class CekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$rules): Response
    {
    if (!Auth::check()){
        return redirect('login');
    }

    $user=Auth::User();
    if($user->level==$rules){
        return $next($request);
    }
    return redirect('login')->with('error',"Silahkan Login Terlebih Dahulu");
    
        
    }
}
