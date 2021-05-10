<?php
namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    //Ref: https://laracasts.com/discuss/channels/laravel/version-8-redirects
    //Ref: https://talltips.novate.co.uk/laravel/laravel-8-conditional-login-redirects
    public function toResponse($request)
    {
        $redirect = config('fortify.home');

        $check = Auth::user()->is_admin;

        if ($check == 0) {
            $redirect = route("clientdashboard");
        }

        return redirect($redirect);

    }

}