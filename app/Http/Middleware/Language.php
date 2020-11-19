<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
{
    private $allowed_langs=['uz','oz', 'ru'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
            if(!in_array($req->l, $this->allowed_langs, true))
            return "not allowed lang";
        
        \Config::set('global.lang', $req->l);
        return $next($req);
    }
}
