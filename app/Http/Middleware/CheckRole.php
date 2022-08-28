<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user()->roles->id;
        if($role == "Admin" && $user != "1"){
            abort(401);
        }
        if($role == "Supplier" && $user != "2"){
            abort(401);
        }
        if($role == "Customer" && $user != "3"){
            abort(401);
        }
        return $next($request);
    }
}
