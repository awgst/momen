<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class OwnershipCheck
{
    /**
     * This middleware is for checking whether the logged in user
     * opens his own profile or other user's
     *
     * If request is equal to logged in user then continue
     */
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(url()->current());
        if(strpos(url()->current(), Auth::user()->username) === false){
            return redirect('user/'.Auth::user()->username.'/setting');
        }
        return $next($request);
    }
}
