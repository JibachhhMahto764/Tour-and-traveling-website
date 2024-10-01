<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class checkForPrice
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the request URL matches traveling/pay or traveling/success
        if ($request->is('traveling/pay') || $request->is('traveling/success')) {
            // Check if the session price is 0, if so, abort with a 403 error
            if (Session::get('price') == 0) {
                return abort(403);
            } 
        }

        // Proceed to the next middleware or request handler
        return $next($request);
    }
}