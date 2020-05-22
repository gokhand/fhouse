<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckSession
{
    /**
     * Check if the session is not exist
     *
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('tokenApi') == null) {
            return redirect('main');
        }

        return $next($request);
    }
}
