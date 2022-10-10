<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

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
        if(!$request->id)
            return route('login');

        $user = User::where("unique_id", $request->id)->first();

        if(!$user)
            $user = User::create([
                "unique_id" => $request->id
            ]);

        Auth::logout();
        Auth::login($user);

        /*if (! $request->expectsJson()) {
            return route('login');
        }*/
    }
}
