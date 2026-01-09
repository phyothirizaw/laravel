<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class CheckName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user) {
            return redirect('/login');
        }

        if ($user->name !== 'admin') {
             abort(403, 'Your name is not set as admin');
        }
        
        return $next($request);
    }
}
