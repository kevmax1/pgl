<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Langue
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = (Session::get('lang')!=null)?Session::get('lang'):'fr';
        App::setLocale($lang);
        return $next($request);
    }
}
