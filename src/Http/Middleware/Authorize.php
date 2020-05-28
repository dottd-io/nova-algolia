<?php

namespace Dottd\NovaAlgolia\Http\Middleware;

use Dottd\NovaAlgolia\NovaAlgolia;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaAlgolia::class)->authorize($request) ? $next($request) : abort(403);
    }
}
