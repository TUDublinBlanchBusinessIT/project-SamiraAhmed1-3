<?php

namespace App\Http\Middleware;

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

            // If request path starts with 'admin' -> redirect to admin login
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            // If request path starts with 'customer' -> redirect to customer login
            if ($request->is('customer') || $request->is('customer/*')) {
                return route('customer.login');
            }

            // Fallback: redirect to general login (if exists)
            return route('login');
        }
    }
}
