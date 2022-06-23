<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UnderDevelopment
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
        // If the site is under development, only the registered IP adresses are allowed to watch the website.
        if(config('cms.common.settings.under_development') === true && in_array(request()->ip(), config('cms.common.settings.developers_ip')) === false)
            return redirect()->route('under-development');
        else
            return $next($request);
    }
}
