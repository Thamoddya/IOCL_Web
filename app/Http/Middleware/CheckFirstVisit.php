<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFirstVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('first_visit')) {
            return redirect()->route('home');
        } else {
            $request->session()->put('first_visit', true);
        }
        return $next($request);
    }
}
