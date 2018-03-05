<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class AdminMiddleware
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
        if(!Auth::user()->hasRole('administrador')){
          $response['error'] = 'unauthorised';
          $response['code'] = 401;
          return response()->json($response, 401);
        }
        else
          return $next($request);
    }
}
