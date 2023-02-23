<?php

namespace App\Http\Middleware;
use http\Env\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            throw new HttpResponseException(
                response()->json(
                    [
                        'status'=>'not logging'
                    ],
                    400
                )
            );

           /* at first this was a redirect to login but i edited it and make it to returm HttpResponseExcep */

        }
    }
}
