<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsJoinCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->course->wishlist !== null) {
            return $next($request);
        }
        notify()->error("You haven't joined the course!");
        return redirect()->route('courses.index');
    }
}
