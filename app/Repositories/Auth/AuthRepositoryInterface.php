<?php

namespace App\Repositories\Auth;

interface AuthRepositoryInterface
{
    public function authenticate($cred);
}
