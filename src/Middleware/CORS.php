<?php

namespace Aic\Hub\Foundation\Middleware;

use Closure;

class CORS
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

        if (\App::environment('testing')) {

            return $next($request);

        }

        header("Access-Control-Allow-Origin: *");

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization, AIC-User-Agent'
        ];

        if ($request->getMethod() == "OPTIONS")
        {

            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return \Response::make('OK', 200, $headers);

        }

        $response = $next($request);

        foreach ($headers as $key => $value)
        {

            $response->headers->set($key, $value);

        }

        return $response;

    }

}
