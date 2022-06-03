<?php

namespace App\Http\Middleware;

use Closure;

class CekLoginDirektur
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
        if(!session('login')) {
            return redirect('admin/login');
        }
        if(session('role') == 'direktur') {
            return $next($request);
        } else if(session('role') == 'hrd') {
            return redirect('hrd');
        }
    }
}
