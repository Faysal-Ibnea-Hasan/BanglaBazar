<?php

namespace App\Repositories\Auth;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{

    public function authenticate($cred)
    {

        // Attempt to log the user in
        if (Auth::attempt($cred)) {
             Admin::findOrFail(Auth::user()->id);
             return true;
        } else{
            return false;
        }
    }
}
