<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    protected $authRepository;
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(AuthRequest $request)
    {
        //return $request;
        $cred = $request->validated();
        $this->authRepository->authenticate($cred);
        return redirect()->route('dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect to the homepage
        return redirect()->route('login');
    }
}
