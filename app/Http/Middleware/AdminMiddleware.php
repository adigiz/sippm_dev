<?php
namespace App\Http\Middleware;
/**
 * Created by PhpStorm.
 * User: AdiGiz
 * Date: 4/15/2018
 * Time: 6:52 PM
 */
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
