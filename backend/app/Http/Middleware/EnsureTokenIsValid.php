<?php

namespace App\Http\Middleware;

use App\Services\TokenService;
use Closure;
use Illuminate\Http\Request;
use ReallySimpleJWT\Token;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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
        if ($this->service->exists($request->bearerToken())) {
            return \response(['message' => 'Client with this token does not exist'], 401);
        }
        return $next($request);
    }
}
