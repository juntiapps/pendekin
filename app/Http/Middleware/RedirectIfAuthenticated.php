<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }
            // dd($guard,Auth::guard($guard));
            if (Auth::guard($guard)->check()) {
                /** @var User $user */
                $user = Auth::user();

                // dd($guards);
                // to admin dashboard
                if($user->hasRole('admin')) {
                    return redirect(route('admin_dashboard'));
                }

                // to user dashboard
                else if($user->hasRole('user')) {
                    return redirect(route('dashboard'));
                }
            }
        }

        return $next($request);
    }
}
