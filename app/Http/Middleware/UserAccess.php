<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if(auth()->user()->user_type === $userType){
            return $next($request);
        }
        return response()->json(['You do not have permission to access for this page.']);
    }
}
