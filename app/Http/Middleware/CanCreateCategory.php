<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CanCreateCategory
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     $authorizationHeader = $request->header('Authorization');
        
    //     if (!$authorizationHeader) {
    //         return response(["message" => "Unauthorized"], 402);
    //     }
        
    //     $token = str_replace('Bearer ', '', $authorizationHeader);
        
    //     $user = Auth::guard('sanctum')->user();
        
    //     if ($user) {
    //         // Log or dump the user and role information for debugging
    //         \Log::info('User: ' . $user->id . ', Role: ' . $user->role);
            
    //         if ($user->hasRole('Admin')) {
    //             return $next($request);
    //         }
    //     }
    
    //     return response(["message" => "No permission"], 406);
    // }
    public function handle(Request $request, Closure $next)
    {
        $authorizationHeader = $request->header('Authorization');
        
        if (!$authorizationHeader) {
            return response(["message" => "Unauthorized"], 401);
        }
        
        $token = str_replace('Bearer ', '', $authorizationHeader);
        
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            
            // Log or dump the user and role information for debugging
            \Log::info('User: ' . $user->id . ', Role: ' . $user->role);
            
            if ($user->hasRole('Admin')) {
                return $next($request);
            }
        }
        
        return response(["message" => "No permission"], 403);
    }
    
    
}
