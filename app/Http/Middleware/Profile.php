<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Profile
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
        if(auth()->user()) {
            $user_profile = auth()->user()->profile;
            if($user_profile->user_role == 0) {
                if($user_profile->birth_date == null || $user_profile->age == null || $user_profile->address == null || $user_profile->medical_history == null) {
                    return redirect()->route('profile.add', [auth()->user()->id, $user_profile->slug]); 
                }
            }
        }
        return $next($request);
    }
}
