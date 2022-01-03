<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
   
    public function handle($request, Closure $next ,...$roles)
    {
        $your_role = $request->user()->role; 
        if (! in_array($your_role, $roles,True)) {
            // Redirect...
            return redirect('/home');  
        }
        
        return $next($request);
    }
}
