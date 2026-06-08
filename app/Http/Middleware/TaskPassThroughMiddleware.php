<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TaskPassThroughMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Currently, the middleware does nothing special, it just lets the request pass through.
        // This is the place to add validation, logging, or permission checks later if needed.

        return $next($request);
    }
}