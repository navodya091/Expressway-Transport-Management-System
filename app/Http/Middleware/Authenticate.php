<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($this->auth->guest()){
            if ($request->ajax()){
                return response('Unauthorized.', 401);
            }
            else{
                return route('login.show');
            }
        }
        if (! $request->expectsJson()) {
            return route('login.show');
        }
    }
}
