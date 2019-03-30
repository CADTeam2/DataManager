<?php

namespace App\Http\Middleware;

use Closure;
use Auth0\SDK\JWTVerifier;
use Auth0\SDK\Helpers\Cache\FileSystemCacheHandler;

class Auth0Middleware
{
    /**
     * Run the request filter.
     *
     * @param  array       $request
     * @param  \Closure    $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->hasHeader('Authorization')) {
            return response()->json('Authorization Header not found', 401);
        }

        $token = $request->bearerToken();

        if($request->header('Authorization') == null || $token == null) {
            return response()->json('No token provided', 401);
        }

        $this->retrieveAndValidateToken($token);

        return $next($request);
    }

    /**
     * verify a given token using the external auth0 servers.
     *
     * @param  Bearer Token    $token
     */
    public function retrieveAndValidateToken($token)
    {
        try {
            $verifier = new JWTVerifier([
                'supported_algs'  => ['RS256'],
                'valid_audiences' => ['https://cadgroup2.jdrcomputers.co.uk/api'],
                'authorized_iss'  => ['https://cadteam2.eu.auth0.com/'],
                'cache'           => new FileSystemCacheHandler(),
            ]);

            $decoded = $verifier->verifyAndDecode($token);
        }
        catch(\Auth0\SDK\Exception\CoreException $e) {
            throw $e;
        };
    }
}
