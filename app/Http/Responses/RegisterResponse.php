<?php
namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
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
