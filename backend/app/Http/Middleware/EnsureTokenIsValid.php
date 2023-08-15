<?php

namespace App\Http\Middleware;

use App\Services\TokenService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    public function __construct(private TokenService $service)
    {
    }

    
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->service->isValid($request->bearerToken())) {
            return \response(['message' => 'Token is not valid'], 401);
        }
        if (!$this->service->isExpired($request->bearerToken())) {
            return \response(['message' => 'Token expired'], 401);
        }
        return $next($request);
    }
}
