<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('Authorization') !== 'vg@123') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
