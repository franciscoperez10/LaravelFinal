<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        if(!$user) {
            return redirect()->route('login');
        }

        if($user->role !== 'admin') {
            return redirect()->route('home_name')->with('error', 'You do not have admin access.');
        }
        return $next($request);
    }
}
