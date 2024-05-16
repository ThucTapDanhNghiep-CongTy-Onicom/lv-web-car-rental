<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $role)
    {
        $roles = explode('/' , $role);
       
        
            foreach($roles as $ref) {
                if(count($roles) > 1)  {
                    if ($request->user()->role == $ref) {
                  
                        return $next($request);
                    } 
                }
               elseif (count($roles) == 1) {
                    if ($request->user()->role == $role) {
                    
                        return $next($request);
                    } 
               }
            }
      
        
     
    }
}
