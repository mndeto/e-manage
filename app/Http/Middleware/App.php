<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Events\UserAccess;

class App
{
    /**
     * Handle an incoming request.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if(!\Session::has('locale'))
  {
     \Session::put('locale', \Config::get('app.locale'));
  }

  app()->setLocale(\Session::get('locale'));

  return $next($request);
    }
}